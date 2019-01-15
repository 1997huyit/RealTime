@extends('master')
@section('customcss')

<link rel="stylesheet" href="{{asset('assets/dropzone/css/dropzone.css')}}">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

@endsection
@section('customjs')
<script src="{{asset('assets/dropzone/js/dropzone.js')}}"></script>
<script src="{{asset('assets/dropzone/js/dropzone-config-edit.js')}}"></script>

@endsection
@section('content')
<style type="text/css">
.wizard > .content{
  min-height: 40em;
}

</style>
<div class="row">
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Sửa Xe</h4>
        <form id="example-form" action="{{route('coordinator.truck.edit', $truck->id)}}" method="post" enctype="multipart/form-data" >
          <input type="hidden" name="_token" value="{{csrf_token()}}"> 
          <div>
            <h3>Thông tin xe</h3>
            <section>
              <div class="form-group">
                <label>Tên xe</label>
                <input type="text" name="name" class="form-control" placeholder="Enter" value="{{$truck->name}}">
              </div>
              <div class="form-group">
                <label>Biển số xe</label>
                <input type="text" name="licenseplate" class="form-control" placeholder="vd:77H7-7777" value="{{$truck->licenseplate}}">
              </div>
              <div class="form-group">
                <label>Nhà sản xuất</label>
                <input type="text" name="manufacturer" class="form-control" placeholder="vd:Huynda, Honda" value="{{$truck->manufacturer}}">
              </div>
              <div class="row">
               <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                 <div class="card-body">
                  <h4 class="card-title">Ảnh giấy đăng ký mặt trước</h4>
                  <input type="file" name="registration1" class="dropify" data-show-remove="false" data-default-file="{{asset('images/license/'.@$truck->registration1)}}">
                  
                </div>
              </div>
            </div>
            <div class="col-lg-6 grid-margin stretch-card">
              <div class="card">
               <div class="card-body">
                <h4 class="card-title">Ảnh giấy đăng ký mặt sau</h4>
                <input type="file" name="registration2" class="dropify" data-show-remove="false" data-default-file="{{asset('images/license/'.@$truck->registration2)}}">
              </div>
            </div>
          </div>
        </div>
      </section>    
      <h3>Hình Ảnh</h3>
      <section>
        <div class="form-check">
          <div class="form-group">
            <div id="errorFileInput" class="contentError"></div>
            <div class="dropzone" id="my-dropzone" name="myDropzone">
            </div>
        </div>

</div>
</section>
</div>
<button type="submit" class="btn btn-primary btn-icon-text">Submit</button>
</form>
</div>
</div>
</div>
</div>

@endsection