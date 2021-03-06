<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CmsController extends Controller
{
    //
    public function contactus()
    {
        $data['editContact'] = DB::table('contact_tb')
                                ->select('*')
                                ->first();
        return view('Admin/contactus',$data);
    }


    public function updateContact(Request $request)
    {
        $validated = $request->validate([
            'phone'        => 'required|max:20',
            'email'        => 'required|max:20',
            'address'        => 'required|max:300',
            'officetime'        => 'required|max:250',
            'map'        => 'required|max:500',
        ]);
        
        
        $data = array(
            'phone'        => $request->input('phone'),
            'email'        => $request->input('email'),
            'address'      => $request->input('address'),
            'officetime'     => $request->input('officetime'),
            'map'     => $request->input('map'),
        );
       $update = DB::table('contact_tb')-> update($data);
       if( $update){
            return redirect('contact_us')->with('status', 'Successfully Added');
       }else{
            return redirect('contact_us')->with('error', 'Something Went Wrong');
       }
        
    }

    public function addbanner(){
        $data['editBanner'] = DB::table('banner_tb')
                                ->select('*')
                                ->first();
        return view('Admin/addbanner',$data);
    }

    

    public function updateBanner(Request $request){
        $validated = $request->validate([
            'name'            => 'required|max:250',
            'description'     => 'required|max:3000',
            'image'           => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048'
        ]);
        if($request->file('image')){
            $image_name = time().$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/p-image',$image_name);
        }else{
            $image_name = $request->input('old_image');
        }

        $data = array(
            'name'            => $request->input('name'),
            'description'     => $request->input('description'),
            'image'           => $image_name
        );

        $update = DB::table('banner_tb')->update($data);

        if($update){
            return redirect('/addbanner')->with('status', 'Update Successfully');
        }else{
            return redirect('/addbanner')->with('error', 'Something Went Wrong');
        }

    }


    public function addsitemap(){
        return view('Admin/oursitemap');
    }
    public function addpolicy(){
        $data['editPrivacy'] = DB::table('privacy_tb')
                                ->select('*')
                                ->first();
        return view('Admin/addprivacypolicy',$data);
    }

    public function updatePolicy(Request $request){
        $validated = $request->validate([
            'header'            => 'required|max:400',
            'description'       => 'required|max:5000'
        ]);
        

        $data = array(
            'header'            => $request->input('header'),
            'description'     => $request->input('description')
        );

        $update = DB::table('privacy_tb')->update($data);

        if($update){
            return redirect('policy')->with('status', 'Update Successfully');
        }else{
            return redirect('policy')->with('error', 'Something Went Wrong');
        }

    }

    public function adddeliveryinfo(){
        return view('Admin/deliveryinfo');
    }


    public function sociallink(){
        $data['sociallink'] = DB::table('social_tb')
                            ->select('*')
                            ->first();
        return view('Admin/sociallink',$data);
    }

    public function updateSociallink(Request $request)
        {
            $validated = $request->validate([
                'facebook'     => 'required|url',
                'twitter'      => 'required|url',
                'linkedin'     => 'required|url',
                'instagram'     => 'required|url',
                'pinterest'    => 'required|url',
            ]);
        
            
            $data = array(
                'facebook'          =>  $request->input('facebook'),
                'twitter'           =>  $request->input('twitter'),
                'linkedin'          =>  $request->input('linkedin'),
                'instagram'          =>  $request->input('instagram'),
                'pinterest'         =>  $request->input('pinterest'),
            );

            

            $update = DB::table('social_tb')->update($data);
            if($update){
                return redirect('sociallink')->with('status','successfully added');
            }else{
                return redirect('sociallink')->with('status', 'something went wrong');
            }
        }


}
