@extends('layouts.app')
@section('content')

@if ( Session::has('success') )
    <div class="alert alert-success alert-dismissible" role="alert">
        <strong>{{ Session::get('success') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
@endif
<?php //Hiển thị thông báo lỗi?>
@if ( Session::has('error') )
    <div class="alert alert-danger alert-dismissible" role="alert">
        <strong>{{ Session::get('error') }}</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger alert-dismissible" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
        </button>
    </div>
@endif
<div class="container" style="margin-top: 10%">
    <div class="row">
        <div class="col-sm-6 col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">ĐĂNG KÝ THÀNH VIÊN</h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="form-control" placeholder="Họ và tên" name="name" type="text" value="{{ old('name') }}" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input class="form-control" placeholder="Email" name="email" type="text" value="{{ old('email') }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input class="form-control" placeholder="Mật khẩu" name="password" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                <input class="form-control" placeholder="Xác nhận mật khẩu" name="password_confirmation" type="password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="form-control" placeholder="Số đt" name="phone" type="text" value="{{ old('phone') }}" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="form-control" placeholder="Số đt" name="address" type="text" value="{{ old('address') }}" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="form-control" placeholder="số nhập đại" name="passport_1" type="text" value="{{ old('passport_1') }}" autofocus>
                            </div>
                        </div>
                        <input type="text" name="address">
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="form-control" placeholder="số nhập đại" name="passport_2" type="text" value="{{ old('passport_2') }}" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <input class="form-control" name="birthday" type="date" value="{{ old('birthday') }}" autofocus>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <select name="sex">
                                  <option value="male">Nam</option>
                                  <option value="female">Nữ</option>
                              </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                <select name="user_type_id">
                                    @foreach($data as $datas)
                                        <option value="{{$datas->id}}">{{$datas->name}}</option>
                                        @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-lg btn-primary btn-block">Đăng ký</button>
                        </div>
                        <center><a href="/{{ url('/login') }}">Quay về đăng nhập</a></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
