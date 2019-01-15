<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\User_type;
use Illuminate\Support\Facades\Input,File;
class UserController extends Controller
{
	// GET CREATER USER //

	public function getCreateUser()
    {
        $userTypes = User_type::all();
    	return view('/account/create', compact('userTypes'));
    }

    // POST ADD USER//

   public function addUser(Request $req){
    	$checkbox = $req->user_types;
    	$checkbox=(int)$checkbox;
    	$user = new User;
    	$user->name = $req->name;

    	if ($req->hasFile('avatar')) 
        {
            $nameImg=$req->file('avatar')->getClientOriginalName();
            $randomName = str_random(4)."_".$nameImg;
            $user->avatar=$randomName;
            $path = $req->file('avatar')->move('assets/images/auth/upload', $randomName);
        }

        $user->email = $req->email;
        $user->password = bcrypt($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->birthday = $req->birthDay;
        $user->sex = $req->sex;

        if ($req->hasFile('passport_1')) 
        {
            $nameImg=$req->file('passport_1')->getClientOriginalName();// lấy tên của cái hình ... .jpg
            $randomName = str_random(4)."_".$nameImg;
            $user->passport_1=$randomName;//đưa tên hình vào ddataabase với trường là image_user
            $path = $req->file('passport_1')->move('assets/images/auth/upload', $randomName);// lưu hình ở thử uploaduser
        }

        if ($req->hasFile('passport_2')) 
        {
            $nameImg=$req->file('passport_2')->getClientOriginalName();
            $randomName = str_random(4)."_".$nameImg;
            $user->passport_2= $randomName ;
            $path = $req->file('passport_2')->move('assets/images/auth/upload',$randomName);
        }

        $user->remember_token = $req->_token;
        $user->user_type_id =$checkbox;
        $user->save();
        return redirect('/manager/account');
    }

    //  GET EDIT USER //

    public function getEditUser($id)
    {
    	$user = User::find($id);
    	$userTypes = User_type::all();
    	return view('account.edit',compact('user','userTypes'));
    }

    // POST EDIT USER //

    public function postEditUser($id,Request $req)
    {
    	$checkbox = $req->user_types;
    	$checkbox=(int)$checkbox;

    	$user = User::find($id);
    	$user->name = $req->name;

    	if ($req->hasFile('avatar')) 
        {
            File::delete('assets/images/auth/upload/'.$user->avatar);
            $nameImg=$req->file('avatar')->getClientOriginalName();
            $randomName = str_random(4)."_".$nameImg;
            $user->avatar=$randomName;
            $path = $req->file('avatar')->move('assets/images/auth/upload', $randomName);
        }

        $user->email = $req->email;
        // $user->password = bcrypt($req->password);
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->birthday = $req->birthDay;
        $user->sex = $req->sex;
        
       
        if ($req->hasFile('passport_1')) 
        {
            File::delete('assets/images/auth/upload/'.$user->passport_1);
            $nameImg=$req->file('passport_1')->getClientOriginalName();// lấy tên của cái hình ... .jpg
            $randomName = str_random(4)."_".$nameImg;
            $user->passport_1=$randomName;//đưa tên hình vào ddataabase với trường là image_user
            $path = $req->file('passport_1')->move('assets/images/auth/upload', $randomName);// lưu hình ở thử uploaduser
        }
        if ($req->hasFile('passport_2')) 
        {
            File::delete('assets/images/auth/upload/'.$user->passport_2);
            $nameImg=$req->file('passport_2')->getClientOriginalName();
            $randomName = str_random(4)."_".$nameImg;
            $user->passport_2= $randomName ;
            $path = $req->file('passport_2')->move('assets/images/auth/upload',$randomName);
        }

        $user->remember_token = $req->_token;
        $user->user_type_id =$checkbox;
        $user->save();
        return redirect('/manager/account');
    }


	// GET LIST USER //
    
    public function getListUser()
    {
        $listUser = User::orderBy('id','DESC')->get();
    	return view('/account/list', compact('listUser'));
    }

    // DELETE USER//

     public function deleteUser($id)
    {
        $deleteUser = User::find($id);
        $deleteUser->delete();
    	return redirect('/manager/account');
    }
    // VIEW PROFILE //
    public function ViewProfile($id){
        $user = User::find($id);
        return view('account.profile',compact('user'));
    }
    // Edit VIEW PROFILE //
    public function EditViewProfile($id,Request $req){

        $user = User::find($id);
        $user->name = $req->name;
        $user->phone = $req->phone;
        $user->address = $req->address;
        $user->save();
        return redirect('profile/'.$id);
    }
}
