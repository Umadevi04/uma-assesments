<?php

namespace App\DataTables;

use App\Models\SubCategory;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class SubCategoriesDataTable extends BaseDataTable
{
    /**
     * Build DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     * @return \Yajra\DataTables\EloquentDataTable
     */
    public function dataTable(QueryBuilder $query)
    {
        return datatables($query)
            ->editColumn('name', function ($model) {
                // return $model->created_at->format('Y-m-d');
                   return $model->name;
            })
            ->addColumn('action', function ($model) {
                $action = '<a href="' . route('webadmin.subcategories.show', $model->id) . '" class="btn btn-primary btn-sm" title="Show"><i class="fa fa-eye text-white"></i></a>&nbsp;';
                $action .= '<a href="' . route('webadmin.subcategories.edit', $model->id) . '" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit text-white"></i></a>&nbsp;';
                    $action .= ' <a href="webadmin.subcategories.index" class="btn btn-danger btn-sm btndelete" data-id="' . $model->id . '" data-model="users" data-route="webadmin" data-loading-text="<i class=\'fa fa-spin fa-spinner\'></i> Please Wait..." title="Delete"><i class="fa fa-trash text-white"></i></a>';
                return $action;
            })
            ->rawColumns(['action']);       
        // return (new EloquentDataTable($query))
        //     ->addColumn('action', 'subcategories.action')
        //     ->setRowId('id');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\SubCategory $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(SubCategory $model): QueryBuilder
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html(): HtmlBuilder
    {
        $params = $this->getBuilderParameters();
        $params['order'] = [[0, 'asc']];
        $params['buttons'] = [];
        $actionParam['width'] = '210px';

        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction($this->getActionParamters())
            ->parameters($params);        
    }

    /**
     * Get the dataTable columns definition.
     *
     * @return array
     */
    public function getColumns(): array
    {
        return [
            Column::make('name')
                    ->width(700), 
               
        ];     
        // return [
        //     Column::computed('action')
        //           ->exportable(false)
        //           ->printable(false)
        //           ->width(60)
        //           ->addClass('text-center'),
        //     Column::make('id'),
        //     Column::make('add your columns'),
        //     Column::make('created_at'),
        //     Column::make('updated_at'),
        // ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'SubCategories_' . date('YmdHis');
    }
}
