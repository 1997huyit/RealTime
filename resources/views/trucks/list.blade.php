@extends('master')
@section('customcss')
<style type="text/css">
  .btnmt{
    width: 100%;
    height: 50px;
  }
</style>
@endsection
@section('content')
<script type="text/javascript">
    function xacnhanxoa(messenger){
        if(window.confirm(messenger)){  
         return true;      
        }
        return false;
    }
</script>
<div class="card">
  <div class="card-body">
    <a href="{{route('coordinator.truck.create')}}">
      <button type="button" class="btn btn-primary btn-rounded btn-fw btn-create-user">Thêm Xe</button>
    </a>
    <div class="row">
      <div class="col-12">
        <div class="table-responsive">
          <table id="order-listing" class="table">
            <thead>
              <tr>
                <th>Hình</th>
                <th>Tên</th>
                <th>Số xe</th>
                <th>Trạng thái</th>
                <th>Bảo dưỡng tới</th>
                <th>Hàng động</th>
                <th>Chức năng</th>
              </tr>
            </thead>
            <tbody>
             @if(isset($trucks))
             @foreach($trucks as $truck)
             <tr>
               <td>
                @if(isset($truck->image))
                <img class="img-lg rounded" src="{{asset('images/license/'.@$truck->image->first()->image)}}">
                @endif
              </td>
               <td><a href="{{route('coordinator.truck.detail', $truck->id)}}">{{$truck->name}}</a></td>
               <td>{{$truck->licenseplate}}</td>
               @if($truck->maintenance!=NULL)
               <td><label class="badge badge-outline-warning badge-pill">Đang bảo dưỡng</label></td>
               
               <td>
                {{$truck->maintenance->end_date}}
              </td>
               <td>
                <a href="{{route('coordinator.schedule.finish', $truck->maintenance->id)}}"><button type="button" class="btn btn-success btn-rounded btn-fw btnmt">Kết thúc bảo dưỡng</button></a>
              </td>
              @else 
              <td>
                <label class="badge badge-outline-success badge-pill">Hoạt động</label>
              </td>
              <td>
                Chưa có lịch
              </td>
              <td>
                <button type="button" class="btn btn-danger btn-rounded btn-fw btn-lg btnmt" data-toggle="modal" data-target="#exampleModal-{{$truck->id}}">Bảo dưỡng</button>
              </td>
              @endif
               <td><a href="{{route('coordinator.truck.edit', $truck->id)}}"><button style="padding: 0"
                class="btn btn-outline-secondary btn-rounded btn-icon btn-edit">
                <i class="fas fa-pencil-alt"></i>
              </button></a>
              <a onclick=" return xacnhanxoa('Bạn có chắc muốn xóa không')" href="{{route('coordinator.truck.delete', $truck->id)}}"><button style="padding: 0"
                class="btn btn-outline-secondary btn-rounded btn-icon btn-delete">
                <i class="far fa-trash-alt"></i>
              </button></a>
            </td>
          </tr>
          <!-- MODAL START -->

          <div class="modal fade" id="exampleModal-{{$truck->id}}" tabindex="-1" role="dialog"  aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modallabel{{$truck->id}}">Tạo lịch bảo dưỡng cho xe: {{$truck->name}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <form enctype="multipart/form-data" action="{{route('coordinator.schedule.post', $truck->id)}}" method="POST">
                  @csrf
                  <div class="modal-body">
                    <div class="row">
                      <div class="col-lg-6 grid-margin d-flex align-items-stretch">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <h4 class="card-title">Bắt đầu bảo trì</h4>

                                <div class="input-group date date-picker" data-provide="datepicker">
                                  <input type="text" class="form-control" name="start_date">
                                  <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-lg-6 grid-margin d-flex align-items-stretch">
                        <div class="row flex-grow">
                          <div class="col-12 grid-margin stretch-card">
                            <div class="card">
                              <div class="card-body">
                                <h4 class="card-title">Kết thúc bảo trì</h4>
                                <div class="input-group date date-picker" data-provide="datepicker">
                                  <input type="text" class="form-control" name="end_date">
                                  <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                  </div>
                                </div>
                              </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                
                <div class="modal-footer">
                  <button type="submit" class="btn btn-success">Submit</button>
                  <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- MODAL END -->
        @endforeach
        @endif
      </tbody>
    </table>
  </div>
</div>
</div>
</div>
</div>
<script type="text/javascript">
  $(function () {
    $('.date-picker').datepicker({
                format    : 'yy-mm-dd',
                minDate: 0,
                todayHighlight: true,
                startDate: 'today',
            });
    });
</script>
@endsection
