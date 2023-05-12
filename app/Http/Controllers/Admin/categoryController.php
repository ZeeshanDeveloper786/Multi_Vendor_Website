<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\section;
use Image;

use function PHPUnit\Framework\fileExists;

class categoryController extends Controller
{
    //
    public function DisplayCategory(){
        $categories = category::with('section','parentCategory')->get();
        // dd($categories);
        return view('admin.categories.category',compact('categories'));
    }

    public function updateCategoryStatus(Request $request){
        // dd($request->all());
        if($request->status == 'Active'){
            $status = 0;
        }else{
            $status = 1;
        }
        // dd($status);

        category::where('id',$request->cat_id)->update([
            'status' => $status
        ]);

        return response()->json(['status'=>$status, 'id' => $request->cat_id]);

    }


    public function deleteCategory(Request $request){
        // dd($request->all());
        $category = category::find($request->cat_id);
        $result = $category->delete();

        if($result){
            return response()->json(['success'=>true, 'id'=>$request->cat_id]);
        }else{
            return response()->json(['success'=>false, 'id'=>$request->cat_id]);
        }
    }

    public function addEditcategory(Request $request,  $id=null){
        
        if(!isset($id)){
            $title = 'Add Category';
            $category = new category();
            $getCategories = array();
            $message = 'Category has been added successfully';

        }else{
            $title = 'Edit Category';
            $category = category::where('id' , $id)->first();
            
            //fetch those categories which are at the root means parent_id =0 and comming from same sections which id is being edited 
            $getCategories = category::with('subCategories')->where([
                ['parent_id', 0],['section_id' , $category->section_id]
            ])->get();

            // dd($getCategories);
            $message = 'Category has been updated successfully';
        }


        if($request->isMethod('post')){
            // dd($request->all());
            
            $request->validate([
                'category_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'parent_id' => 'required',
                'section_id' => 'required',
                'category_discount' => 'required|numeric',
                'category_description' => 'required|regex:/^[\pL\s\-]+$/u',
                'url' => 'required',
                'meta_title' => 'required',
                'meta_description' => 'required',
                'meta_keywords' => 'required|regex:/^[\pL\s\-]+$/u',
            ]);

            if($request->hasFile('category_image')){
                $image = $request->category_image;
                if($image->isValid()){
                    $extension = $image->getClientOriginalExtension();
                    $imageName = time().'.'.$extension;
                    // dd($imageName);
                    $imagePath = 'front/images/category_images/'.$imageName;
                    //upload image
                    Image::make($image)->save($imagePath);
                    $category->category_image = $imageName;        
                }
            }
            else{
                $category->category_image = '';
            }


            $category->parent_id = $request->parent_id;
            $category->section_id = $request->section_id;
            $category->category_name = $request->category_name;
            $category->category_discount = $request->category_discount;
            $category->description = $request->category_description;
            $category->url = $request->url;
            $category->meta_title = $request->meta_title;
            $category->meta_description = $request->meta_description;
            $category->meta_keywords = $request->meta_keywords;
            $category->status = 1;
            $category->save();

            return redirect('admin/categories')->with('success',$message); 
        }
        

        $sections = section::get();
        return view('admin.categories.add-edit-category',compact('title','category','sections','getCategories'));
    }


    public function appendCategoryLevel(Request $request){
        if ($request->ajax()) {
            $getCategories = category::with('subCategories')->where([
                ['parent_id', 0],['section_id' , $request->section_id]
            ])->get();
            return view('admin.categories.categories_level',compact('getCategories'));
         
        }
        
    }

    public function deleteCategoryImage(Request $request){
        //Delete from database
        $categoryImage = category::where('id',$request->img_id)->first();
        

        //delete from folder
        $path = 'front/images/category_images/';
        if (file_exists($path.$categoryImage->category_image)) {
            unlink($path.$categoryImage->category_image);
        }

        category::where('id',$request->img_id)->update([
            'category_image' => ''
        ]);

        return redirect()->back()->with('success','Image has been deleted');
    }
}
