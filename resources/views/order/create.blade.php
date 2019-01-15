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
<script type="text/javascript">
    var i = 1;
    function addRow () {
    if (i == 1) {
    $('#select-customer').attr("disabled", true).focus();
      document.querySelector('#content').insertAdjacentHTML(
        'afterbegin',
        `<div class="row">
        <label class="truck-label">Tên khách hàng</label>
        <input class="form-control" name="customer_name" type="text" />

        <label class="truck-label">Số ĐT khách hàng</label>
        <input class="form-control" name="customer_phone" type="text" />
        
        <label class="truck-label">Email khách hàng</label>
        <input class="form-control" name="customer_email" type="email" />

        <label class="truck-label">Địa chỉ khách hàng</label>
        <input class="form-control" name="customer_address" type="text" />

        <label class="truck-label">chọn loại khách hàng</label>
        <select name="customertype_id">
        @foreach($customer_types as $customer_type)
        <option value="{{$customer_type->id}}">{{$customer_type->name}}</option>
        @endforeach
        </select>

        <input type="button" class="btn btn-danger btn-rounded btn-fw" value="-" onclick="removeRow(this)">
        
        </div>
        `      
        )
    }
    i++;
  }

function removeRow (input) {
  input.parentNode.remove()
  i--;
  $('#select-customer').attr("disabled", false).focus();
}
</script>

@endsection
@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tạo đơn hàng</h4>
                    @if( Auth::user()->user_type_id == 2)
                    <form id="create-order" method="post" action="{{route('coordinator.order.create')}}">
                    @elseif( Auth::user()->user_type_id == 3)
                    <form id="create-order" method="post" action="{{route('seller.order.create')}}">
                    @endif
                    @csrf
                        <div>
                            <h3>Thông tin đơn hàng</h3>
                            <section style="overflow: auto">
                                <div class="form-group">
                                    <label class="truck-label">Tên đơn hàng</label>
                                    <input type="text" class="form-control" name="nameorder"
                                           placeholder="Tên đơn hàng">
                                </div>
                                <div class="form-group">
                                    <label class="truck-label">Địa chỉ lấy hàng</label>
                                    <input type="text" name="deliveryaddress" class="form-control" placeholder="Nhập địa chỉ lấy hàng">
                                </div>
                                <div class="form-group">
                                    <label class="truck-label">Địa chỉ giao hàng</label>
                                    <input type="text" name="takenaddress" class="form-control" placeholder="Nhập địa chỉ giao hàng">
                                </div>
                                <div class="form-group">
                                    <label class="truck-label">Giá vận chuyển</label>
                                    <input class="form-control currencyship" name="shippingcost" data-inputmask="'alias': 'currency'" />
                                </div>
                            </section>
                            <h3>Thông tin kiện hàng</h3>
                            <section style="overflow: auto">
                                <div>
                                    <div class="repeater-default">
                                        <div data-repeater-list="order" class="drag">
                                            <div data-repeater-item="">
                                                <div class="form-group info-order">
                                                    <div class="row">
                                                        <div class="col-md-11">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label class="truck-label"
                                                                               for="exampleInputUsername1">Tên kiện
                                                                            hàng</label>
                                                                        <input type="text"
                                                                               placeholder="Tên kiện hàng"
                                                                               class="form-control truck-form"
                                                                               name="nameitem">
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
                                                                               name="amountitem">
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
                                                                               name="weightitem">
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
                                                                               name="unititem">
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
                                  <select name="customer_id" class="js-example-basic-single select2" id="select-customer" style="width: 100%;">
                                    <option></option>
                                    @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{$customer->name." ".$customer->phone}}</option>
                                    @endforeach
                                </select>
                                </div>
                                <input class="btn btn-info btn-rounded btn-fw" type="button" value="Thêm khách hàng" onclick="addRow()">
                                <div id="content">

                                </div>

                            



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
                                            <option value="{{ $truck->id }}">{{$truck->name." ".$truck->licenseplate}}</option>
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
