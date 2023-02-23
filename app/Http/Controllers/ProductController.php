<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
use App\DataTables\ProductsDataTable;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:product-list|product-create|product-edit|product-delete', ['only' => ['index', 'show']]);
        $this->middleware('permission:product-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:product-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:product-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductsDataTable $dataTable)
     {     
        //dd($dataTable);
        return $dataTable->render('webadmin.products.index');
    }  


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();

        return view('webadmin.products.create', compact('categories', 'subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
        $product           = new Product();
        $product->category_id = $request->category_id;
        $product->sub_category_id = $request->subcategory_id;
        $product->name        = $request->name;
        $product->detail       = $request->detail;
        $product->save();

        // Product::create($request->all());

        return redirect()->route('webadmin.products.index')
            ->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('webadmin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $categories = Category::all();
        $subcategories = SubCategory::all();
        $product = Product::find($id);
        $product['category'] = Category::all();
        $product['subcategory'] = SubCategory::all();
        return view('webadmin.products.edit', compact('product', 'categories', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        // $product->update($request->all());
        $product              = new Product();
        $product->update($request->all());
        $product = Product::find($id);
        $input        = $request->all();
        $product->update($input);


        return redirect()->route('webadmin.products.index')
            ->with('success', 'Product updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('webadmin.products.index')
            ->with('success', 'Product deleted successfully');
    }

    public function getsublist(Request $request)
    {
        //dd($request->cat_id);
        $subcategories = SubCategory::where('category_id', $request->cat_id)->select('id', 'name')->get();
        return $subcategories;
    }
}
