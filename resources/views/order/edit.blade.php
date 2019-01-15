@extends('master')
@section('customcss')

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
@endsection
@section('customjs')
<script type="text/javascript">
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
    $(".js-example-theme-single").select2({
  theme: "classic"
});
});
</script>

@endsection
@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tạo đơn hàng</h4>
                    @if( Auth::user()->user_type_id == 2)
                    <form id="create-order" method="post" action="{{route('coordinator.order.edit',$order->id)}}">
                    @elseif( Auth::user()->user_type_id == 3)
                    <form id="create-order" method="post" action="{{route('seller.order.edit',$order->id)}}">
                    @endif
                    @csrf
                        <div>
                            <h3>Thông tin đơn hàng</h3>
                            <section style="overflow: auto">
                                <div class="form-group">
                                    <label class="truck-label">Tên đơn hàng</label>
                                    <input value="{{$order->name}}" type="text" class="form-control" name="nameorder"
                                           placeholder="Tên đơn hàng">
                                </div>
                                <div class="form-group">
                                    <label class="truck-label">Địa chỉ lấy hàng</label>
                                    <input value="{{$order->deliveryaddress}}" type="text" name="deliveryaddress" class="form-control" placeholder="Nhập địa chỉ lấy hàng">
                                </div>
                                <div class="form-group">
                                    <label class="truck-label">Địa chỉ giao hàng</label>
                                    <input value="{{$order->takenaddress}}" type="text" name="takenaddress" class="form-control" placeholder="Nhập địa chỉ giao hàng">
                                </div>
                                <div class="form-group">
                                    <label class="truck-label">Giá vận chuyển</label>
                                    <input value="{{$order->shippingcost}}" class="form-control currencyship" name="shippingcost" data-inputmask="'alias': 'currency'" />
                                </div>
                            </section>
                            <h3>Thông tin kiện hàng</h3>
                            <section style="overflow: auto">
                                <div>
                                    <div class="repeater-default">
                                        <div data-repeater-list="order" class="drag">
                                            @foreach($order->items as $item)
                                            <div data-repeater-item="">
                                                <div class="form-group info-order">
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <input type="number" hidden name="item_id" value="{{$item->id}}">
                                                            <div class="row">
                                                                
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="truck-label"
                                                                               for="exampleInputUsername1">Tên kiện
                                                                            hàng</label>
                                                                        <input type="text"
                                                                               placeholder="Tên kiện hàng"
                                                                               class="form-control truck-form"
                                                                               name="nameitem" value="{{$item->name}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="truck-label"
                                                                               for="exampleInputUsername1">Số
                                                                            lượng</label>
                                                                        <input type="number"
                                                                               placeholder="Số lượng"
                                                                               class="form-control truck-form"
                                                                               name="amountitem" value="{{$item->amount}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="truck-label"
                                                                               for="exampleInputUsername1">Cân
                                                                            nặng</label>
                                                                        <input type="number"
                                                                               placeholder="Cân nặng"
                                                                               class="form-control truck-form"
                                                                               name="weightitem" value="{{$item->weight}}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="truck-label"
                                                                               for="exampleInputUsername1">Đơn
                                                                            vị</label>
                                                                        <input type="text"
                                                                               placeholder="Đơn vị"
                                                                               class="form-control truck-form"
                                                                               name="unititem" value="{{$item->unit}}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 btn-order">
                                                          <span data-repeater-delete="" style="margin-right: 10px" class="btn btn-danger btn-rounded btn-fw">
                                                            <span class="glyphicon glyphicon-remove"></span> <i class="fas fa-trash-alt"></i>
                                                          </span>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        
                                        @endforeach
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <span data-repeater-create="" class="btn btn-info btn-rounded btn-fw">
                                                    <span class="glyphicon glyphicon-plus"></span> <i class="fas fa-plus"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            </section>
                            <h3>Chọn đối tác</h3>
                            <section style="overflow: auto">


                                <div class="form-group">
                                  <label for="users">Chọn khách hàng</label>
                                  <select name="customer_id" class="js-example-basic-single select2" style="width: 100%;">
                                    @foreach($customers as $customer)
                                    @if($order->customer_id == $customer->id)
                                    <option value="{{ $customer->id }}" selected>{{$customer->name." ".$customer->phone}}</option>
                                    @endif
                                    <option value="{{ $customer->id }}">{{$customer->name." ".$customer->phone}}</option>
                                    @endforeach
                                </select>
                            </div>


                            </section>
                            </section>
                            @if(Auth::user()->user_type_id == 2)
                            <h3>Chọn xe</h3>
                            <section style="overflow: auto">

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="users">Chọn xe</label>
                                            <select name="truck_id" class="js-example-basic-single select2" style="width: 100%;">
                                            <option></option>
                                            @foreach($trucks as $truck)
                                            @if($order->truck_id == $truck->id)
                                            <option value="{{ $truck->id }}" selected>{{$truck->name." ".$truck->licenseplate}}}</option>
                                            @endif
                                            <option value="{{ $truck->id }}">{{$truck->name." ".$truck->licenseplate}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="users">Chọn tài xế</label>
                                            <select name="driver_id" class="js-example-basic-single select2" style="width: 100%;">
                                            @foreach($drivers as $driver)
                                            @if($order->driver_id == $driver->id)
                                            <option value="{{ $driver->id }}" selected>{{$driver->name." ".$driver->phone}}</option>
                                            @endif
                                            <option value="{{ $driver->id }}"">{{$driver->name." ".$driver->phone}}</option>
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                          <label for="users">Chọn phụ xe</label>
                                            <select name="extra_id" class="js-example-basic-single select2" style="width: 100%;">
                                            @foreach($extras as $extra)
                                            @if($order->extra_id == $extra->id)
                                            <option value="{{ $driver->id }}" selected>{{$extra->name." ".$extra->phone}}</option>
                                            @else
                                            <option value="{{ $extra->id }}">{{$extra->name." ".$extra->phone}}</option>
                                            @endif
                                            @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                            </section>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){

            $(".currencyship").inputmask({ 
                alias : "currency", 
                prefix: 'VND ', 
                rightAlign: false, 
                removeMaskOnSubmit: true
            });
      });
    </script>
@endsection
