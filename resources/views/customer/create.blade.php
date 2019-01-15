@extends('master')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tạo Khách Hàng</h4>

                    @if (Session::has('thongbao'))
                        <div class="alert alert-success">{{ Session::get('thongbao') }}</div>
                    @endif

                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            @foreach($errors->all() as $err)
                                {{$err}}<br>
                            @endforeach
                        </div>
                    @endif
                    
                    @if(Auth::user()->user_type_id==2)
                    <form id="create-form" action="{{route('coordinator.createCustomer')}}" method="post" enctype="multipart/form-data">
                    @elseif(Auth::user()->user_type_id==3)
                    <form id="create-form" action="{{route('seller.createCustomer')}}" method="post" enctype="multipart/form-data">
                    @endif
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div>
                            <h3>Thông tin</h3>
                            <section>
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input type="text" name="name" class="form-control" aria-describedby="emailHelp" placeholder="Nhập Tên">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Nhập Email">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label>Địa Chỉ</label>
                                    <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ">
                                </div>
                                <div class="form-group">
                                    <label>Điện Thoại</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Nhập điện thoại ">
                                </div>
                            </section>
                            <h3>Loại Khách Hàng</h3>
                            <section>
                                <div class="form-group">
                                    <label>Loại khách hàng</label>
                                    <select name="customertype" class="type-customer">
                                        @foreach($customer as $cus)
                                            <option value="{{$cus->id}}">{{$cus->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
