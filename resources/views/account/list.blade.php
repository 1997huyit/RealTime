@extends('master')
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
            <a href="{{route('manager.createAccount')}}">
                <button type="button" class="btn btn-primary btn-rounded btn-fw btn-create-user">Thêm tài khoản</button>
            </a>
            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                            <tr>
                                <th>Ảnh đại diện</th>
                                <th>Họ tên</th>
                                <th>Chức danh</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Chức Năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach( $listUser as $list)
                            <tr>
                                <td>
                                    <img src="{{asset('assets/images/auth/upload/').'/'.$list->avatar}}">
                                </td>
                                <td>{{$list->name}}</td>
                                <td>{{$list->role->name}}</td>
                                <td>{{$list->phone}}</td>
                                <td>{{$list->email}}</td>
                                <td>
                                    <a href="{!! URL::route('manager.editUser',$list['id'])!!}"><button style="padding: 0"
                                            class="btn btn-outline-secondary btn-rounded btn-icon btn-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button></a>
                                    <a onclick=" return xacnhanxoa('Bạn có chắc muốn xóa không')" href="{!! URL::route('manager.deleteUser',$list['id'])!!}"><button style="padding: 0"
                                            class="btn btn-outline-secondary btn-rounded btn-icon btn-delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button></a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
