@extends('master')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tạo tài khoản</h4>
                    <form id="create-form" action="{{route('manager.createUser')}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                        <div>
                            <h3>Tài khoản</h3>
                            <section>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Nhâp Email">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                                <div class="form-group">
                                    <label>Mật Khẩu</label>
                                    <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu">
                                </div>
                                <div class="form-group">
                                    <label>Điện Thoại</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Nhập điện thoại">
                                </div>
                            </section>
                            <h3>Thông tin</h3>
                            <section>
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input type="text" name="name" class="form-control" aria-describedby="emailHelp" placeholder="Nhập tên">
                                </div>    
                                <div class="form-group">
                                    <label>Địa Chỉ</label>
                                    <input type="text" name="address" class="form-control" placeholder="Nhập địa chỉ">
                                </div>
                                <div class="form-group">
                                    <label>Ngày Sinh</label>
                                    <div id="datepicker-popup" class="input-group date datepicker">
                                        <input type="text" name="birthDay" class="form-control">
                                        <span class="input-group-addon input-group-append border-left">
                                            <span class="mdi mdi-calendar input-group-text"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Giới tính</label> 
                                    <label style="margin-left: 30px">
                                        <input type="radio" name="sex" value="Male">Nam
                                    </label>
                                    <label style="margin-left: 30px">
                                        <input type="radio" name="sex" value="Female">Nữ
                                    </label>
                                   <!--  <select name="sex">
                                        <option value="male">male</option>
                                        <option value="female">female</option>
                                    </select> -->
                                </div>
                            </section>
                            <h3>Cấp quyền</h3>
                            <section>
                                <div class="form-group">
                                  <!--  -->
                                     @foreach($userTypes as $userT) 
                                    <div class="form-check">                                          
                                        <label class="form-check-label">
                                          <input name="user_types" type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="{{$userT->id}}">
                                          {{$userT->name}}
                                        </label>
                                    </div>  
                                    @endforeach                              
                                </div>
                            </section>
                            <h3>Hình Ảnh</h3>
                            <section>
                                <h3>Hình Ảnh</h3>
                                <div class="form-check">
                                    <div class="row">
                                        <div class="col-lg-4 grid-margin stretch-card">
                                          <div class="card">
                                            <div class="card-body">
                                              <h4 class="card-title d-flex">Hình ảnh đại diện
                                              </h4>
                                              <input type="file" class="dropify" name="avatar" />
                                            </div>
                                          </div>
                                        </div>
                                       <div class="col-lg-4 grid-margin stretch-card">
                                          <div class="card">
                                            <div class="card-body">
                                              <h4 class="card-title d-flex">Hình ảnh CMT mặt trước
                                              </h4>
                                              <input type="file" class="dropify" name="passport_1" />
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-lg-4 grid-margin stretch-card">
                                          <div class="card">
                                            <div class="card-body">
                                              <h4 class="card-title d-flex">Hình ảnh CMT mặt sau
                                              </h4>
                                              <input type="file" class="dropify" name="passport_2" />
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection