@extends('master')
@section('content')
    <div class="row">
        <div class="col-12 grid-margin">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Sửa tài khoản</h4> <div class="form-group">   
                                </div>
                    <form id="edit-form" action="{{route('manager.editUser',$user->id )}}}" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                        <div>
                            <h3>Tài khoản</h3>
                            <section>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control" aria-describedby="emailHelp" placeholder="Enter"  value="{{$user->email}}">
                                    <small id="emailHelp" class="form-text text-muted"></small>
                                </div>
                               <!--  <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" placeholder="Password" value="">
                                </div> -->
                                <div class="form-group">
                                    <label>Điện thoại</label>
                                    <input type="text" name="phone" class="form-control" placeholder="Enter Phone" value="{{$user->phone}}">
                                </div>
                            </section>
                            <h3>Thông tin</h3>
                            <section>
                                <div class="form-group">
                                    <label>Tên</label>
                                    <input type="text" name="name" class="form-control" aria-describedby="emailHelp" placeholder="Enter Name" value="{{$user->name}}">
                                </div>
                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" name="address" class="form-control" placeholder="Enter Address" value="{{$user->address}}">
                                </div>
                                <div class="form-group">
                                    <label>Ngày sinh</label>
                                    <div id="datepicker-popup" class="input-group date datepicker">
                                        <input type="text" class="form-control" name="birthDay" value="{{$user->birthday}}">
                                        <span class="input-group-addon input-group-append border-left">
                                          <span class="mdi mdi-calendar input-group-text"></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Giới tính</label>
                                    <!-- <input type="text" name="sex" class="form-control"  placeholder="Enter Sex" value="{{$user->sex}}"> -->
                                    <label style="margin-left: 30px">
                                        <input type="radio" name="sex" value="Male" 
                                        @if(($user->sex)=='Male')
                                          {{"checked"}}
                                        @endif
                                        >Name
                                    </label>
                                    <label style="margin-left: 30px">
                                        <input type="radio" name="sex" value="Female"
                                        @if(($user->sex)=='Female')
                                          {{"checked"}}
                                        @endif
                                        >Nữ
                                    </label>
                                </div>
                            </section>
                            <h3>Cấp quyền</h3>
                            <section>
                                <div class="form-group">
                                     @foreach($userTypes as $userT) 
                                    <div class="form-check">                                          
                                        <label class="form-check-label">
                                          <input name="user_types" type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="{{$userT->id}}"
                                        @if($user->role->id == $userT->id)
                                        {{"checked"}}
                                        @endif
                                        >
                                        <!-- kiem tra  id user  = vs user type -->
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
                                              <img width="200px" height="100px" src="{{asset('assets/images/auth/upload/').'/'.$user->avatar}}">
                                              <input type="file" class="dropify" name="avatar" />
                                            </div>
                                          </div>
                                        </div>
                                       <div class="col-lg-4 grid-margin stretch-card">
                                          <div class="card">
                                            <div class="card-body">
                                              <h4 class="card-title d-flex">Hình ảnh CMT mặt trước
                                              </h4>
                                               <img width="200px" height="100px" src="{{asset('assets/images/auth/upload/').'/'.$user->passport_1}}">
                                              <input type="file" class="dropify" name="passport_1"/>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-lg-4 grid-margin stretch-card">
                                          <div class="card">
                                            <div class="card-body">
                                              <h4 class="card-title d-flex">Hình ảnh CMT mặt sau
                                              </h4>
                                               <img  width="200px" height="100px" src="{{asset('assets/images/auth/upload/').'/'.$user->passport_2}}">
                                              <input type="file" class="dropify" name="passport_2"/>
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