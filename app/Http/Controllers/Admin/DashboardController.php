<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Role;
use App\Models\Permission;
use App\Models\SubCategory;
use App\Models\Post;


class DashboardController extends Controller
{
    public function index()
    {
        $data['products'] = Product::all()->count();
        $data['roles']  = Role::all()->count();
        $data['users']  = User::all()->count();
        $data['permissions'] = Permission::all()->count();
        $data['categories']  = Category::all()->count();
        $data['sub_categories'] = SubCategory::all()->count();
        $data['posts']  = Post::all()->count();
        // dd($data);
        return view('webadmin.dashboard.index',compact('data'));
    }
}
