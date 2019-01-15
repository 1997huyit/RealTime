<?php

namespace App\Http\Controllers;
use App\Customer;
use App\CustomerType;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
 	public function getListCustomer(){
 		$customer = Customer::all();
 		return view('customer.list',compact('customer'));
 	}
 	public function getCreateCustomer(){
 		$customer = CustomerType::all();
 		return view('customer.create',compact('customer'));
 	}
 	public function postCreateCustomer(Request $req){
 		 $this->validate($req,[
                        'name'              =>'required',
                        'email'              =>'required|email',
                        'address'              =>'required',
                        'phone'                =>'required',
                     ],[
                        'name.required'             =>'Vui lòng nhập tên khách hàng',
                        'email.required'             =>'Vui lòng nhập Email',
                        'email.email'          =>'Vui lòng nhập Đúng định dạng Email',
                        'address.required'             =>'Vui lòng nhập địa chỉ',
                        'phone.required'       =>'Vui lòng nhập só điện thoại' 
                     ]);
 		$checkbox = $req->customertype;
    	$checkbox=(int)$checkbox;

 		$customer = new Customer;
 		$customer->email = $req->email;
        $customer->name = $req->name;
        $customer->phone = $req->phone;
        $customer->address = $req->address;
        $customer->customertype_id =$checkbox;
        $customer->save();
        session()->flash('thongbao', 'Tạo danh mục thành công');
        if (Auth::user()->user_type_id == 2) {
            return redirect()->route('coordinator.cusomter.list');
        }
        elseif (Auth::user()->user_type_id == 3) {
            return redirect()->route('seller.customer.list');
        }
 	}
 	public function getEditCustomer($id,Request $req){
 		$customer = Customer::find($id);
 		$customerType = CustomerType::all(); 
 		return view('customer.edit',compact('customer','customerType'));
 	}
 	public function postEditCustomer($id,Request $req){
 		$this->validate($req,[
                        'name'              =>'required',
                        'email'              =>'required|email',
                        'address'              =>'required',
                        'phone'                =>'required',
                     ],[
                        'name.required'             =>'Vui lòng nhập tên khách hàng',
                        'email.required'             =>'Vui lòng nhập Email',
                        'email.email'          =>'Vui lòng nhập Đúng định dạng Email',
                        'address.required'             =>'Vui lòng nhập địa chỉ',
                        'phone.required'       =>'Vui lòng nhập só điện thoại' 
                     ]);
 		$checkbox = $req->customertype;
    	$checkbox=(int)$checkbox;
    	$customer = Customer::find($id);
 		$customer->email = $req->email;
        $customer->name = $req->name;
        $customer->phone = $req->phone;
        $customer->address = $req->address;
        $customer->customertype_id =$checkbox;
        $customer->save();
        session()->flash('thongbao', 'Cập nhật danh mục thành công');
        if (Auth::user()->user_type_id == 2) {
            return redirect()->route('coordinator.cusomter.list');
        }
        elseif (Auth::user()->user_type_id == 3) {
            return redirect()->route('seller.customer.list');
        }
 	}
 	public function delteCustomer($id){
 		$customer = Customer::find($id);
 		$customer->delete();
 		session()->flash('thongbao', 'Xóa danh mục thành công');
        return redirect()->back();
 	}
}
