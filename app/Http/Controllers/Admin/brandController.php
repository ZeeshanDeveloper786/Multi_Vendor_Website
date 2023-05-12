<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\brand;

class brandController extends Controller
{
    public function brandsDisplay(){
        $brands = brand::all();
        return view('admin.brands.brand',compact('brands'));
    }

    public function updatebrand(Request $request){
        // dd($request->all());
        if($request->Status == 'Active'){
            $status = 0;
        }else{
            $status = 1;
        }

        brand::where('id',$request->brand_id)->update([
            'status' => $status
        ]);

        return response()->json(['status'=>$status, 'id' => $request->brand_id]);

    }


    public function deletebrand(Request $request){
        
        $Curbrand = brand::find($request->brand_id);
        $result = $Curbrand->delete();

        
        if($result){
            return response()->json(['success'=>true, 'data'=>$request->brand_id]);
        }else{
            return response()->json(['success'=>false]);
        }
    }

    // add edit section, so in case of add no id will be come so it will be optional and when we will edit someone we have to get its id so it will also be worked

    public function addEditBrand(Request $request, $id =null){
      
        if (!isset($id)) {
            $title = 'Add brand';
            $brandData = new brand();
            $message = 'brand added Successfully';
        }else{
            $title = 'Edit brand';
            $brandData = brand::where('id' , $id)->first();
            $message = 'brand Updated Successfully';
        }

        if($request->isMethod('post')){
            $request->validate([
                'brand_name' => 'required|regex:/^[\pL\s\-]+$/u'
            ]);

            $brandData->name = $request->brand_name;
            $brandData->status = 1;
            $result = $brandData->save();

            return redirect('admin/brands')->with('success',$message); 
        }

        return view('admin.brands.add-edit-brand',compact('title','brandData'));
    }
}
