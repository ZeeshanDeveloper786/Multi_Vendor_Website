<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Middleware\Admin;
use App\Models\admin as ModelsAdmin;
use App\Models\vendor;
use App\Models\vendorsBankDetail;
use App\Models\vendorsBusinessDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class AdminController extends Controller
{
    public function dashboard(Request $request){
        // dd($request);
        return view('admin.dashboard');
    }

    public function loggedIn(Request $request){

        //because we use single route for get and post using match route so condition for post route


        if($request->isMethod('post')){
            $input = $request->all();

            $validated = $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required',
            ]);

            //if auth guard is admin and credantials are match in db than
            if(Auth::guard('admin')->attempt(['email' =>$input['email'], 'password' => $input['password'], 'status' => 1])){
                return redirect('admin/dashboard')->with('success','you are logged in successfully..!');
            }else{
                return redirect()->back()->with('fail','invalid Email or Password..!');
            }
        }

        return view('admin.login');
    }

    public function updateAdminPassword(Request $request){
        if($request->isMethod('post')){
            // dd($request->all());
            if (Hash::check(($request->current_password), Auth::guard('admin')->user()->password)){
                // if current password is matched with admin password in db than now we check new and confirm password
                if($request->new_password == $request->confirm_password){
                    ModelsAdmin::where('id',Auth::guard('admin')->user()->id)
                    ->update(['password' => Hash::make($request->new_password)]);

                    return back()->with('success','Your password has been updated');   
                }else{
                    return back()->with('fail','New password and confirm password does not matched');
                }

            }else{
                return back()->with('fail','Your current password is incorrect');                
            }
        }

        $admindata = ModelsAdmin::where('email',Auth::guard('admin')->user()->email)->first();
        // dd($admindata);
        return view('admin.settings.update-admin-password',compact('admindata'));
    }

    public function checkAdminPassword(Request $request){
        // dd(Hash::check($request->current_password));
        if (Hash::check(($request->current_password), Auth::guard('admin')->user()->password)) {
           return 'true';
        }else{
            return 'false';
        }
        // $check = Hash::check($request->current_password);
    }

    public function updateAdminDetails(Request $request){
        
        if ($request->isMethod('post')) {
            $request->validate([
                'admin_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'admin_mobile' => 'required|numeric|digits:11',
                'admin_image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            // dd($request->all());
            if($request->hasFile('admin_image')){
                $image = $request->admin_image;
                if($image->isValid()){
                    $extension = $image->getClientOriginalExtension();
                    $imageName = time().'.'.$extension;
                    // dd($imageName);
                    $imagePath = 'admin/images/photos/'.$imageName;
                    //upload image
                    Image::make($image)->save($imagePath);
    
                }
            }
            else if(!empty($request->current_admin_image)){
                $imageName = $request->current_admin_image;
            }else{
                $imageName = '';
            }
            
            ModelsAdmin::where('id',Auth::guard('admin')->user()->id)->update([
                'name' => $request->admin_name,
                'mobile' => $request->admin_mobile,
                'image' => $imageName
            ]);
            return back()->with('success','Admin details updated successfully');
        }
        return view('admin.settings.update-admin-details');
    }
    
    public function updateVendorDetails($slug, Request $request){
        // dd($slug);

    if($slug == 'personal'){
        if($request->isMethod('post')){
            // $data = $request->all();
            // dd($data);
            $request->validate([
                'vendor_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'vendor_address' => 'required',
                'vendor_city' => 'required',
                'vendor_state' => 'required',
                'vendor_country' => 'required',
                'vendor_pincode' => 'required',
                'vendor_mobile' => 'required|numeric|digits:11',
                'vendor_image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            // dd($request->all());
            if($request->hasFile('vendor_image')){
                $image = $request->vendor_image;
                if($image->isValid()){
                    $extension = $image->getClientOriginalExtension();
                    $imageName = time().'.'.$extension;
                    // dd($imageName);
                    $imagePath = 'admin/images/photos/'.$imageName;
                    //upload image
                    Image::make($image)->save($imagePath);
    
                }
            }
            else if(!empty($request->current_vendor_image)){
                $imageName = $request->current_vendor_image;
            }else{
                $imageName = '';
            }

            // update data in admin table
            ModelsAdmin::where('id',Auth::guard('admin')->user()->id)->update([
                'name' => $request->vendor_name,
                'mobile' => $request->vendor_mobile,
                'image' => $imageName
            ]);
            // update data in vendor table
            vendor::where('id', Auth::guard('admin')->user()->vendor_id)->update([
                'name' => $request->vendor_name,
                'address' => $request->vendor_address,
                'city' => $request->vendor_city,
                'state' => $request->vendor_state,
                'country' => $request->vendor_country,
                'pincode' => $request->vendor_pincode,
                'mobile' => $request->vendor_mobile,
            ]);
            return back()->with('success','Vendor details updated successfully');

        }
        // vendor personal details
        $vendorDetails = vendor::where('id',Auth::guard('admin')->user()->vendor_id)->first();
        // dd($vendorDetails);

    }else if($slug == 'business'){
        if($request->isMethod('post')){
            // dd($request->current_address_proof_image);
            $request->validate([
                'shop_name' => 'required|regex:/^[\pL\s\-]+$/u',
                'shop_address' => 'required',
                'shop_city' => 'required',
                'shop_state' => 'required',
                'shop_country' => 'required',
                'shop_pincode' => 'required',
                'shop_mobile' => 'required|numeric|digits:11',
                'address_proof' => 'required',
                'address_proof_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'business_license_number' => 'required',
                'gst_number' => 'required',
                'pan_number' => 'required',

            ]);
            // dd($request->current_address_proof_image);

            if($request->hasFile('address_proof_image')){
                $image = $request->address_proof_image;
                // dd($image);
                if($image->isValid()){
                    $extension = $image->getClientOriginalExtension();
                    $imageName = time().'.'.$extension;
                    // dd($imageName);
                    $imagePath = 'admin/images/proofs/'.$imageName;
                    // upload image
                    Image::make($image)->save($imagePath);
    
                }
            }elseif(!empty($request->current_address_proof_image)){
                $imageName = $request->current_address_proof_image;
            }else{
                $imageName = '';
            }

            // update data in vendor table
            vendorsBusinessDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update([
                'shop_name' => $request->shop_name,
                'shop_address' => $request->shop_address,
                'shop_city' => $request->shop_city,
                'shop_state' => $request->shop_state,
                'shop_country' => $request->shop_country,
                'shop_pincode' => $request->shop_pincode,
                'shop_mobile' => $request->shop_mobile,
                'address_proof' => $request->address_proof,
                'address_proof_image' => $imageName,
                'business_license_number' => $request->business_license_number,
                'gst_number' => $request->gst_number,
                'pan_number' => $request->pan_number,
            ]);
            return back()->with('success','Vendor Shop details updated successfully');

        }
        // business/shop details 
        $vendorDetails = vendorsBusinessDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first();
        // dd($vendorDetails);
    }else if($slug == 'bank'){
        if($request->isMethod('post')){
            $request->validate([
                'Account_Holder_Name' => 'required|regex:/^[\pL\s\-]+$/u',
                'bank_name' => 'required',
                'account_number' => 'required|numeric',
                'swift_code' => 'required',
            ]);
            
            // update data in vendor table
            vendorsBankDetail::where('vendor_id', Auth::guard('admin')->user()->vendor_id)->update([
                'Account_Holder_Name' => $request->Account_Holder_Name,
                'bank_name' => $request->bank_name,
                'account_number' => $request->account_number,
                'swift_code' => $request->swift_code,
            ]);
            return back()->with('success','Vendor Bank details updated successfully');

        }
        $vendorDetails = vendorsBankDetail::where('vendor_id',Auth::guard('admin')->user()->vendor_id)->first();
        // dd($vendorDetails);
    }
    return view('admin.settings.update_vendor_details',compact('slug','vendorDetails'));
    }

    public function adminsManagement($type=null){
        if(!empty ($type)){
            // dd($type);
        $adminsData = ModelsAdmin::where('type',$type)->get();
        $title = ucfirst($type).'s';
        
        }else{
            $title = 'All Admins/Subadmins/vendors';
            $adminsData = ModelsAdmin::all();
        }

        return view('admin.admins.admin',compact('adminsData','title'));
    }

    public function viewVendorsDetails($id){
        $vendorDetails = ModelsAdmin::with('vendorPersonal','vendorBusiness','vendorBank')->where('id',$id)->first();
        // $abc = vendor::with('admin')->get();
        // return $abc;
        return view('admin.admins.view-vendor-details',compact('vendorDetails'));

    }

    public function AdminStatusUpdate(Request $request){
        // dd($request);
        // Admin_id: 1
        // Status: Active
        // dd($request->Admin_id);
        if($request->Status == 'Active'){
           $status = 0;
        }else{
            $status = 1;
        }
        
        ModelsAdmin::where('id',$request->Admin_id)->update([
            'status'=> $status
        ]);

        // dd($test);
        
        return response()->json(['status'=>$status, 'adminID' => $request->Admin_id]);
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('admin/login');
    }
}
