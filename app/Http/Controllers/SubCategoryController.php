<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use App\DataTables\SubCategoriesDataTable;
use App\Models\Category;

class SubCategoryController extends Controller
{
      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:sub_category-list|sub_category-create|sub_category-edit|sub_category-delete', ['only' => ['index','store']]);
         $this->middleware('permission:sub_category-create', ['only' => ['create','store']]);
         $this->middleware('permission:sub_category-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:sub_category-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SubCategoriesDataTable $dataTable)
    {        
        return $dataTable->render('webadmin.subcategories.index');       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $categories=Category::all();    
        return view('webadmin.subcategories.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('hi');
        $this->validate($request, [
            'name' => 'required',            
        ]);
 //dd($request);
        $subcategory              = new SubCategory();
        $subcategory->category_id = $request->category_id;
        $subcategory->name        = $request->name;         
        $subcategory->save();  
      
        return redirect()->route('webadmin.subcategories.index')
                        ->with('success','SubCategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subcategory)
    {
        return view('webadmin.subcategories.show',compact('subcategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {             
        $categories=Category::all(); 
        $subcategory = SubCategory::find($id);
         $subcategory['category']=Category::all();
         return view('webadmin.subcategories.edit',compact('subcategory','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // dd($request);
        $this->validate($request, [
            'name' => 'required',            
        ]);
        $subcategory              = new SubCategory();
        $subcategory->update($request->all());
        $subcategory = SubCategory::find($id);
        $input        = $request->all();        
        $subcategory->update($input);      

        return redirect()->route('webadmin.subcategories.index')
                        ->with('success','SubCategory updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subcategory)
    {
        $subcategory->delete();
        return redirect()->route('webadmin.subcategories.index')
                        ->with('success','SubCategory deleted successfully');
    }
}
