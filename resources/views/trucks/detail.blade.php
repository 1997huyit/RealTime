@extends('master')
@section('content')
<style type="text/css">
    .lightGallery .image-tile img{
        height: 100%;
    }
</style>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="truck-label" for="exampleInputUsername1">Tên xe:</label>
                                <input type="text" class="form-control truck-form" id="exampleInputUsername1" value="{{$truck->name}}"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label class="truck-label" for="exampleInputUsername1">Biển số xe:</label>
                                <input type="text" class="form-control truck-form" id="exampleInputUsername1" value="{{$truck->licenseplate}}"
                                       disabled>
                            </div>
                            <div class="form-group">
                                <label class="truck-label" for="exampleInputUsername1">Hãng sản xuất</label>
                                <input type="text" class="form-control truck-form" id="exampleInputUsername1" value="{{$truck->manufacturer}}"
                                       disabled>
                            </div>

                            <a href="{{route('coordinator.truck.edit', $truck->id)}}"><button type="button" class="btn btn-primary btn-rounded btn-fw">Chỉnh sửa xe</button></a>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="truck-label" for="exampleInputUsername1">Giấy đăng ký xe:</label>
                                <div id="lightgallery1" class="row lightGallery">
                                    <a href="{{asset('images/license/'.@$truck->registration1)}}" class="image-tile"><img
                                            src="{{asset('images/license/'.@$truck->registration1)}}" alt="image small">
                                    </a>
                                    <a href="{{asset('images/license/'.@$truck->registration2)}}" class="image-tile"><img
                                            src="{{asset('images/license/'.@$truck->registration2)}}" alt="image small">
                                    </a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="truck-label" for="exampleInputUsername1">Hình ảnh xe:</label>
                                <div id="lightgallery2" class="row lightGallery">
                                    @foreach($truck->image as $image)
                                    <a href="{{asset('images/license/'.$image->image)}}" class="image-tile"><img
                                            src="{{asset('images/license/'.$image->image)}}" alt="image small">
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12" style="border-top: 1px solid #eee">
                            <h4 class="card-title">Lịch bảo dưỡng</h4>
                            <div class="table-responsive">
                                <table id="order-listing" class="table">
                                    <thead>
                                    <tr>
                                        <th>Ngày bắt đầu</th>
                                        <th>Ngày kết thúc</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @if($truck->maintenance!=NULL)
                                        <td>{{$truck->maintenance->start_date}}</td>
                                        <td>{{$truck->maintenance->start_date}}</td>
                                        <td>{{$truck->maintenance->status}}</td>
                                        @endif
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
