<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\section;
use Session;

class sectionController extends Controller
{
    //
    public function sectionsDisplay(){
        $sections = section::all();
        return view('admin.sections.section',compact('sections'));
    }

    public function updateSection(Request $request){
        // section_id
        // Status
        if($request->Status == 'Active'){
            $status = 0;
        }else{
            $status = 1;
        }

        section::where('id',$request->section_id)->update([
            'status' => $status
        ]);

        return response()->json(['status'=>$status, 'id' => $request->section_id]);

    }


    public function deleteSection(Request $request){
        
        $CurSection = section::find($request->Sec_id);
        $result = $CurSection->delete();

        
        if($result){
            return response()->json(['success'=>true, 'data'=>$request->Sec_id]);
        }else{
            return response()->json(['success'=>false, 'data'=>$request->Sec_id]);
        }
    }

    // add edit section, so in case of add no id will be come so it will be optional and when we will edit someone we have to get its id so it will also be worked

    public function addEditSection(Request $request, $id =null){
      
        if (!isset($id)) {
            $title = 'Add Section';
            $sectionData = new section();
            $message = 'Section added Successfully';
        }else{
            $title = 'Edit Section';
            $sectionData = Section::where('id' , $id)->first();
            $message = 'Section Updated Successfully';
        }

        if($request->isMethod('post')){
            $request->validate([
                'section_name' => 'required|regex:/^[\pL\s\-]+$/u'
            ]);

            $sectionData->name = $request->section_name;
            $sectionData->status = 1;
            $result = $sectionData->save();

            return redirect('admin/section')->with('success',$message); 
        }

        return view('admin.sections.add-edit-section',compact('title','sectionData'));
    }
}
