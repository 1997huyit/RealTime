<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Truck;
use App\Image_truck;
use App\Maintenance_schedule;
use Validator;
class TruckController extends Controller
{
    public function getListTruck(){
    	$trucks = Truck::all();
    	return view('trucks.list', compact('trucks'));
    }

    public function getCreateTruck(Request $request){
    	return view('trucks.create');
    }

    public function postCreateTruck(Request $request){
         $messages = [
            'required' => 'Trường :attribute bắt buộc nhập.',
        ];
        $validator = Validator::make($request->all(), [
            'name'     => 'required|max:255',
            'licenseplate'     => 'required',
            'manufacturer'     => 'required',
            'registration1'     => 'required',
            'registration2'     => 'required',
            'file'     => 'required'
            
        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('truck.create')
                    ->withErrors($validator)
                    ->withInput();
        } else {
    	$truck = new Truck();
    	$truck->name = $request->name;
    	$truck->licenseplate = $request->licenseplate;
    	$truck->manufacturer = $request->manufacturer;
    	if ($request->hasFile('registration1') && $request->hasFile('registration2') && $request->hasFile('file')) {
                $registration1 = $request->file('registration1');
                $registration2 = $request->file('registration2');
                
                $destinationPath = public_path() . '/images/license';
                    if ($registration1->isValid() && $registration2->isValid()) {
                        $FileName1 = time() . $registration1->getClientOriginalName();
                        $FileName2 = time() . $registration2->getClientOriginalName();
                        $registration1->move($destinationPath, $FileName1);
                        $registration2->move($destinationPath, $FileName2);
                        $truck->registration1 = $FileName1;
                        $truck->registration2 = $FileName2;
                    }
                    $truck->save();
                foreach ($request->file('file') as $fileKey => $fileObject) {
                    // make sure each file is valid
                    $truckImages = new Image_truck();
                    if ($fileObject->isValid()) {
                        $destinationFileName = time() . $fileObject->getClientOriginalName();
                        $fileObject->move($destinationPath, $destinationFileName);
                        $truckImages->truck_id = $truck->id;
                        $truckImages->image = $destinationFileName;

                    }
                    $truckImages->save();
                }
        }
        
        return redirect()->route('coordinator.truck.list');
    }
    }

    public function getEditTruck($id){
        $truck = Truck::find($id);
        return view('trucks.edit', compact('truck'));
    }
    public function postEditTruck($id,Request $request){
        $messages = [
            'required' => 'Trường :attribute bắt buộc nhập.',
        ];
        $validator = Validator::make($request->all(), [
            'name'     => 'required|max:255',
            'licenseplate'     => 'required',
            'manufacturer'     => 'required',
            
        ], $messages);

        if ($validator->fails()) {
            return redirect()->route('coordinator.truck.edit', $id)
                    ->withErrors($validator)
                    ->withInput();
        } else {
            $truck = Truck::find($id);
            $truck->name = $request->name;
            $truck->licenseplate = $request->licenseplate;
            $truck->manufacturer = $request->manufacturer;
            $destinationPath = public_path() . '/images/license';
            if ($request->hasFile('registration1')) {
                $registration1 = $request->file('registration1');
                if ($registration1->isValid()) {
                    $FileName1 = time() . $registration1->getClientOriginalName();                   
                    $registration1->move($destinationPath, $FileName1);                   
                    $truck->registration1 = $FileName1;
                }
            }
            if ($request->hasFile('registration2')) {
                $registration2 = $request->file('registration2');
                if ($registration2->isValid()) {
                    $FileName2 = time() . $registration2->getClientOriginalName();                       
                    $registration2->move($destinationPath, $FileName2);                       
                    $truck->registration2 = $FileName2;                     
                }
            }
            $truck->save();
            return redirect()->route('coordinator.truck.list')
                    ->with('message', 'Đăng ký thành công.');
        }
        
    }
    public function deleteTruck($id){
        $truck = Truck::find($id);
        $truck->image->each->delete();
        $truck->delete();
        return redirect()->route('coordinator.truck.list');
    }

    public function deleteImage($id, Request $request)
    {
        $imgname = $request->imgname;
        $data = Truck::find($id);
        $images = $data->image->where('path', $imgname)->first();
        // $images = $images->image;
        $images->delete();
        $destinationPath = public_path() . '/images/truck/';
        File::delete($destinationPath . $imgname);
        
    }

    public function getServerImages($id)
    {
        $data = Truck::find($id);
        $images = $data->image;
        $imageAnswer = [];

        foreach ($images as $image) {
            $imageAnswer[] = [
                'original' => $image->path,
                'size' => File::size(public_path('images/room/' . $image->image))
            ];
        }
        return response()->json([
            'images' => $imageAnswer
        ]);
    }

    public function newMaintenance($id, Request $request){
        $schedule = new Maintenance_schedule();
        $schedule->start_date = $request->start_date;
        $schedule->end_date = $request->end_date;
        $schedule->truck_id = $id;
        $schedule->status = 1;
        $schedule->save();
        return redirect()->route('coordinator.truck.list');
    }
    public function finishMaintenance($id){
        $schedule = Maintenance_schedule::find($id);
        $schedule->status = 0;
        $schedule->save();
        $schedule->delete();
        return redirect()->route('coordinator.truck.list');
    }

    public function getDetailTruck($id){
        $truck = Truck::find($id);
        return view('trucks.detail', compact('truck'));
    }
}
