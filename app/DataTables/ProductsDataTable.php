<?php

namespace App\DataTables;

use App\Models\Product;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ProductsDataTable extends BaseDataTable
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
        ->addColumn('Category Name', function ($model) {
            // return $model->created_at->format('Y-m-d');
            // dd($model->category_id);
               return $model->category_id;
        })
        ->addColumn('action', function ($model) {
            $action = '<a href="' . route('webadmin.products.show', $model->id) . '" class="btn btn-primary btn-sm" title="Show"><i class="fa fa-eye text-white"></i></a>&nbsp;';
            $action .= '<a href="' . route('webadmin.products.edit', $model->id) . '" class="btn btn-success btn-sm" title="Edit"><i class="fa fa-edit text-white"></i></a>&nbsp;';
            $action .= ' <a href="webadmin.products.index" class="btn btn-danger btn-sm btndelete" data-id="' . $model->id . '" data-model="users" data-route="webadmin" data-loading-text="<i class=\'fa fa-spin fa-spinner\'></i> Please Wait..." title="Delete"><i class="fa fa-trash text-white"></i></a>';
            return $action;
        })
        ->rawColumns(['action']);     
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Product $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Product $model): QueryBuilder
    {
        return $model->with('categories')->newQuery();
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
                    ->width(200), 
            Column::make('detail')
                    ->width(200),
            Column::make('Category Name')
                    ->width(200),
               
        ];      
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename(): string
    {
        return 'Products_' . date('YmdHis');
    }
}
