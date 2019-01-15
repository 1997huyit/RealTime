@extends('master')
@section('customcss')

<link rel="stylesheet" href="{{asset('assets/dropzone/css/dropzone.css')}}">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<style type="text/css">
.wizard > .content{
  min-height: 40em;
}

</style>
@endsection
@section('customjs')
<script src="{{asset('assets/dropzone/js/dropzone.js')}}"></script>
<script src="{{asset('assets/dropzone/js/dropzone-config.js')}}"></script>
@endsection
@section('content')
<div class="row">
    <div class="col-12 grid-margin">
        <div class="card">
            <div class="card-body">
                @if (count($errors) > 0)
                <div class="alert alert-danger">
                  Thông tin đăng ký không đầy đủ, bạn cần chỉnh sửa như sau:
                  <ul>
                      @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
              @endif
              @if (isset($message))
              <div class="alert alert-success">
                  {{ $message }}
              </div>
              @endif
              <h4 class="card-title">Tạo Xe</h4>
              <form id="create-form" action="{{route('coordinator.truck.create')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}"> 
                <div>
                    <h3>Thông tin</h3>
                    <section>
                        <div class="form-group">
                            <label>Tên xe</label>
                            <input type="text" name="name" class="form-control" placeholder="Enter">
                        </div>
                        <div class="form-group">
                            <label>Biển số xe</label>
                            <input type="text" name="licenseplate" class="form-control" placeholder="vd:77H7-7777">
                        </div>
                        <div class="form-group">
                            <label>Nhà sản xuất</label>
                            <input type="text" name="manufacturer" class="form-control" placeholder="vd:Huynda, Honda">
                        </div>
                        <div class="form-group">
                          <div class="row">
                            <div class="col-lg-6 grid-margin stretch-card">
                              <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title d-flex">Nhập ảnh mặt trước giấy đăng kí
                                  </h4>
                                  <input type="file" class="dropify" name="registration1"/>
                                </div>
                              </div>
                            </div>
                            <div class="col-lg-6 grid-margin stretch-card">
                              <div class="card">
                                <div class="card-body">
                                  <h4 class="card-title d-flex">Nhập ảnh mặt sau giấy đăng kí
                                  </h4>
                                  <input type="file" class="dropify" name="registration2" />
                                </div>
                              </div>
                            </div>
                          </div>



                  </section>
                  <h3>Hình ảnh</h3>
                  <section> 
                    <div class="form-group">
                        <div class="row" id="image-wrapper">
                            <div class="col-lg-3 grid-margin stretch-card">
                                <div class="card">
                                   <div class="card-body">
                                      <h4 class="card-title">Upload ảnh xe</h4>
                                      <input type="file" name="file[]" class="dropify" />
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 grid-margin stretch-card">
                                <div class="card">
                                   <div class="card-body">
                                      <h4 class="card-title">Upload ảnh xe</h4>
                                      <input type="file" name="file[]" class="dropify" />
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 grid-margin stretch-card">
                                <div class="card">
                                   <div class="card-body">
                                      <h4 class="card-title">Upload ảnh xe</h4>
                                      <input type="file" name="file[]" class="dropify" />
                                  </div>
                              </div>
                          </div>
                          <div class="col-lg-3 grid-margin stretch-card">
                                <div class="card">
                                   <div class="card-body">
                                      <h4 class="card-title">Upload ảnh xe</h4>
                                      <input type="file" name="file[]" class="dropify" />
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