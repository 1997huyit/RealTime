@extends('master')
@section('content')
<div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-8">
                      <form action="{{route('profile',$user->id)}}" method="post">
                        <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                            <div class="form-group">
                                <label class="truck-label" for="exampleInputUsername1">Tên:</label>
                                <input type="text" class="form-control truck-form" id="exampleInputUsername1" value="{{$user->name}}" name="name">
                            </div>
                            <div class="form-group">
                                <label class="truck-label" for="exampleInputUsername1">Chức Danh:</label>
                                <input type="text" class="form-control truck-form" id="exampleInputUsername1" value="{{$user->role->name}}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="truck-label" for="exampleInputUsername1">Email:</label>
                                <input type="text" class="form-control truck-form" id="exampleInputUsername1" value="{{$user->email}}" disabled>
                            </div>
                            <div class="form-group">
                                <label class="truck-label" for="exampleInputUsername1">Điện Thoại:</label>
                                <input type="text" class="form-control truck-form" id="exampleInputUsername1" value="{{$user->phone}}" name="phone">
                            </div>
                            <div class="form-group">
                                <label class="truck-label" for="exampleInputUsername1">Địa chỉ:</label>
                                <input type="text" class="form-control truck-form" id="exampleInputUsername1" value="{{$user->address}}" name="address">
                            </div>
                            <div class="form-group">
                            <input type="submit" class="btn btn-primary btn-rounded btn-fw" value="Sửa Thông Tin">
                             </div>
                        </div>
                      </form>
                    <div class="col-lg-4">
                      <div class="profile-feed">
                        <div class="d-flex align-items-start profile-feed-item">
                          <img src="{{asset('assets/images/auth/upload/'.$user->avatar)}}" alt="profile" class="cus-img-lg"/>
                          <div class="ml-4">
                            <h6>
                              Avatar
                            </h6> 
                          </div>
                        </div>
                      </div>
                      <div class="profile-feed">
                        <div class="d-flex align-items-start profile-feed-item">
                          <img src="{{asset('assets/images/auth/upload/'.$user->passport_1)}}" alt="profile" class="cus-img-lg"/>
                          <div class="ml-4">
                            <h6>
                              CMT mặt trước
                            </h6> 
                          </div>
                        </div>
                      </div>
                      <div class="profile-feed">
                        <div class="d-flex align-items-start profile-feed-item">
                          <img src="{{asset('assets/images/auth/upload/'.$user->passport_2)}}" alt="profile" class="cus-img-lg"/>
                          <div class="ml-4">
                            <h6>
                              CMT mặt sau
                            </h6> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

@endsection