<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use App\Item;
use App\User;
use App\Truck;
use App\Order;
use Auth;
use App\CustomerType;
use App\User_type;

use App\Events\OrderLoaded;
class OrderController extends Controller
{
    public function leaderboard () {
        return Order::all();
    }
    //
    public function getOrder(){
        $orders = Order::all();
        $drivers = User::all();
        return view('order.list', compact('orders', 'drivers'));
    }
    public function getCreateOrder(){
        $customers =  Customer::all();
        $trucks = Truck::all();
        $extras = User::all();
        $now = time();
        // $drivers = User_type::find(7)->users->each->day_off;
        // var_dump($drivers);die;
        // foreach ($drivers as $driver) {
        //     if(!isset($driver->day_off) && $now<strtotime($driver->day_off->start_date))
        //         $data = $driver->get();
        // }
        // die($drivers);
        $customer_types = CustomerType::all();
        return view('order.create',compact('customers','drivers','trucks','extras','customer_types'));
    }

    public function postCreateOrder(Request $request){
        if($request->customer_name){
            $customer = new Customer();
            $customer->name = $request->customer_name;
            $customer->phone = $request->customer_phone;
            $customer->email = $request->customer_email;
            $customer->address = $request->customer_address;
            $customer->customertype_id = $request->customertype_id;
            $customer->save();

            $order = new Order();
            $order->name = $request->nameorder;
            $order->deliveryaddress = $request->deliveryaddress;
            // $order->takenaddress = $request->takenaddress;
            // $order->shippingcost = $request->shippingcost;
            // $order->payment_status = $request->payment_status;
            // $order->driver_id = $request->driver_id;
            // $order->extra_id = $request->extra_id;
            // $order->user_id = Auth::user()->id;
            // $order->truck_id = $request->truck_id;
            // $order->customer_id = $customer->id;
            $order->save();
            $datas = $request->order;
            foreach ($datas as $data) { 
                $item = new Item();
                $item->name = $data['nameitem'];
                $item->amount = $data['amountitem'];
                $item->weight = $data['weightitem'];
                $item->unit = $data['unititem'];
                $item->order_id = 2;
                $item->save();
            }
        }
        else{
            $order = new Order();
            $order->name = $request->nameorder;
            $order->deliveryaddress = $request->deliveryaddress;
            // $order->takenaddress = $request->takenaddress;
            // $order->shippingcost = $request->shippingcost;
            // $order->payment_status = $request->payment_status;
            // $order->driver_id = $request->driver_id;
            // $order->extra_id = $request->extra_id;
            // $order->user_id = Auth::user()->id;
            // $order->truck_id = $request->truck_id;
            // $order->customer_id = $request->customer_id;
            $order->save();
            $datas = $request->order;
            foreach ($datas as $data) { 
                $item = new Item();
                $item->name = $data['nameitem'];
                $item->amount = $data['amountitem'];
                $item->weight = $data['weightitem'];
                $item->unit = $data['unititem'];
                $item->order_id = 2;
                $item->save();
            }
        }
        if (Auth::user()->user_type_id == 2) {
            event(new OrderLoaded($order));
            return redirect()->route('coordinator.order.list');
        }
        elseif (Auth::user()->user_type_id == 3) {
            event(new OrderLoaded($order));
            return redirect()->route('seller.order.list');
        }
    }

    public function getEditOrder($id){
        $order = Order::find($id);
        $customers =  Customer::all();
        $drivers = User::all();
        $trucks = Truck::all();
        $extras = User::all();
        return view('order.edit',compact('order','customers','drivers','trucks','extras'));
    }

    public function postEditOrder($id, Request $request){
        $order = Order::find($id);
        $order->name = $request->nameorder;
        $order->deliveryaddress = $request->deliveryaddress;
        $order->takenaddress = $request->takenaddress;
        $order->shippingcost = $request->shippingcost;
        $order->payment_status = $request->payment_status;
        $order->driver_id = $request->driver_id;
        $order->extra_id = $request->extra_id;
        $order->user_id = Auth::user()->id;
        $order->truck_id = $request->truck_id;
        $order->customer_id = $request->customer_id;
        $order->save();
        $datas = $request->order;
        $order->items->each->delete();
            foreach ($datas as $key => $data) { 
                $item = new Item();
                $item->name = $data['nameitem'];
                $item->amount = $data['amountitem'];
                $item->weight = $data['weightitem'];
                $item->unit = $data['unititem'];
                $item->order_id = $order->id;
                $item->save();
            }

        if (Auth::user()->user_type_id == 2) {
            return redirect()->route('coordinator.order.list');
        }
        elseif (Auth::user()->user_type_id == 3) {
            return redirect()->route('seller.order.list');
        }
    }

    public function getDetailOrder($id){
        $order = Order::find($id);
        $customers =  Customer::all();
        $drivers = User::all();
        $trucks = Truck::all();
        $extras = User::all();
        return view('order.detail', compact('order','drivers', 'trucks', 'extras'));
    }

    public function editTransport($id, Request $request){
        $order = Order::find($id);
        if(isset($request->driver_id))
        $order->driver_id = $request->driver_id;
        if(isset($request->extra_id))
        $order->extra_id = $request->extra_id;
        if(isset($request->truck_id))
        $order->truck_id = $request->truck_id;
        $order->save();
        if(Auth::user()->user_type_id==2)
        return redirect()->route('coordinator.order.detail', $id);
        elseif (Auth::user()->user_type_id==3)
        return redirect()->route('seller.order.detail', $id);
    }

    public function deleteOrder($id){
        $order = Order::find($id);
        if(isset($order->items))
        $order->items->each->delete();
        $order->delete();
        if(Auth::user()->user_type_id==2)
        return redirect()->route('coordinator.order.list');
        elseif (Auth::user()->user_type_id==3)
        return redirect()->route('seller.order.list');
    }
}
