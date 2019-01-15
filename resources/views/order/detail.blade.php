@extends('master')
@section('customcss')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
    <style type="text/css">
        .btn-driver{
            color: #fff;
            width: 100%;
            height: 50px;
        }
        .btn-light{
            background-color: #bcbbcc;
        }
        .bar-code img{
            width: 90%;
            height: 250px;
        }
        .top-order{
            margin-top: 50px;
            border-bottom: 1px solid #eee;
        }
        .order-status{
            margin-top: 30px;
        }
        .border-table{
            background-color: #eee;
        }
        .border-table tr th{
            font-weight: 700;
        }
        .border-bottom{
            border-bottom: 1px solid #eee;
        }
        
    </style>
@endsection
@section('customjs')
<script type="text/javascript">
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>

@endsection
@section('content')
    <link href="https://printjs-4de6.kxcdn.com/print.min.css" rel="stylesheet">
    
    <div class="card">
        <div class="card-body">
            @if( Auth::user()->user_type_id == 2)
            <div class="row">
                <div class="col-md-3">
                    <a href="{{route('coordinator.order.edit', $order->id)}}">
                        <button type="button" class="btn btn-primary btn-rounded btn-fw btn-driver">Sửa đơn hàng</button>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="#">
                        <button type="button" class="btn btn-light btn-rounded btn-fw btn-driver" data-toggle="modal" data-target="#driver" data-whatever="@mdo">Chọn tài xế</button>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="#">
                        <button type="button" class="btn btn-light btn-rounded btn-fw btn-driver" data-toggle="modal" data-target="#extra" data-whatever="@mdo">Chọn phụ xe</button>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="#">
                        <button type="button" class="btn btn-light btn-rounded btn-fw btn-driver" data-toggle="modal" data-target="#vehicle" data-whatever="@mdo">Chọn xe</button>
                    </a>
                </div>
                <div class="col-md-3">
                        <button type="button" onclick="printJS({ printable: 'print', type: 'html'})" class="btn btn-danger btn-rounded btn-fw btn-driver">In đơn hàng</button>
                </div>
            </div>
            @elseif(Auth::user()->user_type_id == 3)
            <div class="row">
                <div class="col-md-3">
                    <a href="{{route('seller.order.edit', $order->id)}}">
                        <button type="button" class="btn btn-primary btn-rounded btn-fw btn-driver">Sửa đơn hàng</button>
                    </a>
                </div>
                <div class="col-md-3">
                        <button type="button" onclick="printJS({ printable: 'print', type: 'html'})" class="btn btn-danger btn-rounded btn-fw btn-driver">In đơn hàng</button>
                </div>
            </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="order-status">
                        <h3 class="title-status">Thạng thái đơn hàng</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="border-table">
                            <tr>
                                <th>
                                    Hình ảnh
                                </th>
                                <th>
                                    Tên trạng thái
                                </th>
                                <th>
                                    Ngày
                                </th>
                                <th>
                                    Thông tin Kho
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(isset($order->order_status))
                            @foreach($order->order_status as $order_status)
                            <tr>
                                <td class="py-1">
                                    <img src="../../../../images/faces/face1.jpg" alt="image"/>
                                </td>
                                <td>
                                    {{$order_status->name}}
                                </td>
                                <td>
                                    {{$order_status->time}}
                                </td>
                                <td>
                                    {{$order_status->warehouse->name}}
                                </td>
                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div id="print">

                <div class="row top-order">
                    <div class="col-md-12">
                        <div class="order-status" style="margin-bottom: 50px; background-color: #eee; height: 50px; align-items: center; display: flex">
                            <h3 class="title-status">Thông tin đơn hàng</h3>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="bar-code">
                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/3/3a/Example_barcode.svg/1200px-Example_barcode.svg.png">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="name-order">
                            <p>Tên đơn hàng: </p> <h5>{{$order->name}}</h5>
                            <p>Địa chỉ lấy hàng: </p> <h5>{{$order->deliveryaddress}}</h5>
                            <p>Địa chỉ giao hàng: </p> <h5>{{$order->takenaddress}}</h5>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="order-status">
                            <h3 class="title-status">Thông tin tài xế lấy hàng</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="border-table">
                                <tr>
                                    <th>
                                        Hình ảnh
                                    </th>
                                    <th>
                                        Tên tài xế
                                    </th>
                                    <th>
                                        Số điện thoại
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($order->driver))
                                <tr> 
                                    <td>
                                        <img src="{{$order->driver->avatar}}" alt="image"/>
                                    </td>
                                    <td>
                                        {{$order->driver->name}}
                                    </td>
                                    <td>
                                        {{$order->driver->phone}}
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    Chưa có lái xe
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="order-status">
                            <h3 class="title-status">Thông tin phụ xe lấy hàng</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="border-table">
                                <tr>
                                    <th>
                                        Hình ảnh
                                    </th>
                                    <th>
                                        Tên phụ xe
                                    </th>
                                    <th>
                                        Số điện thoại
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($order->extra))
                                <tr>
                                    <td>
                                        <img src="{{$order->extra->avatar}}" alt="image"/>
                                    </td>
                                    <td>
                                        {{$order->extra->name}}
                                    </td>
                                    <td>
                                        {{$order->extra->phone}}
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    Chưa có phụ xe
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="order-status">
                            <h3 class="title-status">Thông tin Xe</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="border-table">
                                <tr>
                                    <th>
                                        Hình ảnh
                                    </th>
                                    <th>
                                        Loại xe
                                    </th>
                                    <th>
                                        Biển số xe
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(isset($order->truck))
                                <tr>
                                    <td>
                                        <img src="{{$order->truck->avatar}}" alt="image"/>
                                    </td>
                                    <td>
                                        {{$order->truck->name}}
                                    </td>
                                    <td>
                                        {{$order->truck->licenseplate}}
                                    </td>
                                </tr>
                                @else
                                <tr>
                                    Chưa có xe
                                </tr>
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="row border-bottom">
                    <div class="col-md-12">
                        <div class="order-status">
                            <h3 class="title-status">Thông tin kiện hàng</h3>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead class="border-table">
                                <tr>
                                    <th>
                                        Số TT
                                    </th>
                                    <th>
                                        Tên kiện hàng
                                    </th>
                                    <th>
                                        Số lượng
                                    </th>
                                    <th>
                                        Đơn vị
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(isset($order->items))
                                @foreach($order->items as $key => $item)
                                <tr>
                                    <td>
                                        {{$key}}
                                    </td>
                                    <td>
                                        {{$item->name}}
                                    </td>
                                    <td>
                                        {{$item->amount}}
                                    </td>
                                    <td>
                                        {{$item->unit}}
                                    </td>
                                </tr>
                                @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    
    
    {{-- Chọn tài xế--}}

    <div class="modal fade" id="driver" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Chọn tài xế</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            <form action="{{route('coordinator.order.change', $order->id)}}" method="post">
            @csrf
                <div class="modal-body">
                    
                        <select name="driver_id" class="js-example-basic-single select2" style="width: 100%;">
                           <option></option>          
                            @foreach($drivers as $driver)
                            @if($order->driver) && $driver->id == $order->driver->id)
                            <option selected value="{{$order->driver_id}}">{{$order->driver->name." ".$order->driver->phone}}</option>
                            @else
                            <option value="{{ $driver->id }}">{{$driver->name." ".$driver->phone}}</option>
                            @endif
                            @endforeach
                        </select>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit    " class="btn btn-success">Lưu</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>
                </div>
            </form>
            </div>
        </div>
    </div>


    {{--Chọn phu xe--}}
    <div class="modal fade" id="extra" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Chọn phụ xe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('coordinator.order.change', $order->id)}}" method="post">
                @csrf
                <div class="modal-body">
                    
                        <select name="extra_id" class="js-example-basic-single select2" style="width: 100%;">
                            
                            <option></option>          
                            @foreach($extras as $extra)
                            @if(isset($order->extra) && $extra->id == $order->extra->id)
                            <option selected value="{{$order->extra_id}}">{{$order->extra->name." ".$order->extra->phone}}</option>
                            @else
                            <option value="{{ $extra->id }}">{{$extra->name." ".$extra->phone}}</option>
                            @endif
                            @endforeach
                        </select>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Lưu</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>
                </div>
                </form>
            </div>
        </div>
    </div>


{{--Chọn xe--}}
    <div class="modal fade" id="vehicle" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="ModalLabel">Chọn xe</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('coordinator.order.change', $order->id)}}" method="post">
                @csrf
                <div class="modal-body">
                        <select name="truck_id" class="js-example-basic-single select2" style="width: 100%;">     
                            <option></option>          
                            @foreach($trucks as $truck)
                            @if($order->truck) && $truck->id == $order->truck->id)
                            <option selected value="{{$order->extra_id}}">{{$order->truck->name." ".$order->truck->licenseplate}}</option>
                            @else
                            <option value="{{ $extra->id }}">{{$truck->name." ".$truck->licenseplate}}</option>
                            @endif
                            @endforeach
                        </select>
                    
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Lưu</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal">Đóng</button>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
