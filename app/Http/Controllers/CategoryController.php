<?php

namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function getAddCategory(){
        $categories = Categories::all();
        return view('admin/categories/add_category',['categories'=>$categories]);
    }
    public function postAddCategory(Request $request){
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
        $categories->name = $request->name;
        $categories->menu_id = $request->menu_id;
//        if ($request->has('parent_id')){
//            $categories->parent_id = $request -> parent_id;
//        }
//        else{
//            $categories->parent_id = "";
//        }
        $categories->save();

        return redirect('admin/categories/add_category')->with('Notify', 'Lưu danh mục thành công');
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

        return redirect('admin/categories/view_category')->with('Notify', 'Xóa danh mục thành công');
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
                'name.required'=>'Vui lòng điền dữ liệu cho tên danh mục',
                'name.min'=>'Danh mục phải từ 2 đến 255 kí tự',
                'name.max'=>'Danh mục phải từ 2 đến 255 kí tự'
            ]);
        $categories = Categories::all()->find($id);
        $categories->name = $request -> name;
//        if ($request->has('parent_id')){
//            $categories->parent_id = $request -> parent_id;
//        }
//        else{
//            $categories->parent_id = "";
//        }
        $categories->save();

//        return redirect('admin/categories/edit/'.$id)->with('Notify', 'Edit category successfully');
        return redirect('admin/categories/view')->with('Notify', 'Sửa danh mục thành công');
    }
}
