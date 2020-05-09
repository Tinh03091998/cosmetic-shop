<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function getAddcategory(){
        $categories = Categories::all();
        return view('admin/categories/add_category',['categories'=>$categories]);
    }
    public function postAddcategory(Request $request){
        $this->validate($request,
            [
                'name'=>'required|min:2|max:255|unique:categories'
            ],
            [
                'name.required'=>'Please fill data in [Category name] field',
                'name.min'=>'Category name must be from 2 to 255 characters',
                'name.max'=>'Category name must be from 2 to 255 characters',
                'name.unique'=>'Category name has already existed'
            ]);
        $categories = new Categories();
        $categories->name = $request -> name;
        if ($request->has('parent_id')){
            $categories->parent_id = $request -> parent_id;
        }
        else{
            $categories->parent_id = "";
        }
        $categories->save();

        return redirect('admin/categories/add')->with('Notify', 'Save category successfully');
    }

//    View Categories
    public function getViewCategory(){
        //show 10 products
        $categories = Categories::paginate(10);
        return view('admin/categories/view_category', ['categories'=>$categories]);
    }

    //function get delete category
    public function getDeleteCategory($id){
        $categories = Categories::find($id);
        $categories->delete();

        return redirect('admin/categories/view')->with('Notify', 'Delete category successfully');
    }

    //get edit category
    public function getEditCategory($id){
        $categories = Categories::all()->find($id);
        return view('admin/categories/edit_category', ['categories'=>$categories]);
    }

    public function postEditCategory(Request $request,$id){
        $this->validate($request,
            [
                'name'=>'required|min:2|max:255'
            ],
            [
                'name.required'=>'Please fill data in [Category name] field',
                'name.min'=>'Category name must be from 2 to 255 characters',
                'name.max'=>'Category name must be from 2 to 255 characters'
            ]);
        $categories = Categories::all()->find($id);
        $categories->name = $request -> name;
        if ($request->has('parent_id')){
            $categories->parent_id = $request -> parent_id;
        }
        else{
            $categories->parent_id = "";
        }
        $categories->save();

        return redirect('admin/categories/edit/'.$id)->with('Notify', 'Edit category successfully');
    }
}
