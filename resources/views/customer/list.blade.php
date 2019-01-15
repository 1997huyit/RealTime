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
            @if (Session::has('thongbao'))
                    <div class="alert alert-success">{{ Session::get('thongbao') }}</div>
                    @endif

  

            @if(Auth::user()->user_type_id==3)
            <a href="{{route('seller.createCustomer')}}">
                <button type="button" class="btn btn-primary btn-rounded btn-fw btn-create-user">Thêm Khách Hàng</button>
            </a>
            @endif
            @if(Auth::user()->user_type_id==2)
            <a href="{{route('coordinator.createCustomer')}}">
                <button type="button" class="btn btn-primary btn-rounded btn-fw btn-create-user">Thêm Khách Hàng</button>
            </a>
            @endif   
            

            <div class="row">
                <div class="col-12">
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                            <tr>
                                <th>Họ tên</th>
                                <th>Khách hàng</th>
                                <th>Số điện thoại</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($customer as $cus)
                            <tr>
                                <td>{{$cus->name}}</td>
                                <td>{{$cus->role->name}}</td>
                                <td>{{$cus->phone}}</td>
                                <td>{{$cus->email}}</td>
                                <td>{{$cus->address}}</td>
                                <td>
                                    @if('Auth::user()->user_type_id==3')
                                    <a href="{!! URL::route('seller.editCustomer',$cus['id'])!!}"><button style="padding: 0"
                                            class="btn btn-outline-secondary btn-rounded btn-icon btn-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button></a>
                                    <a onclick=" return xacnhanxoa('Bạn có chắc muốn xóa không')" href="{!! URL::route('seller.deleteCustomer',$cus['id'])!!}"><button style="padding: 0"
                                            class="btn btn-outline-secondary btn-rounded btn-icon btn-delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button></a>
                                    @elseif('Auth::user()->user_type_id==2')
                                    <a href="{!! URL::route('coordinator.editCustomer',$cus['id'])!!}"><button style="padding: 0"
                                            class="btn btn-outline-secondary btn-rounded btn-icon btn-edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button></a>
                                    <a onclick=" return xacnhanxoa('Bạn có chắc muốn xóa không')" href="{!! URL::route('coordinator.deleteCustomer',$cus['id'])!!}"><button style="padding: 0"
                                            class="btn btn-outline-secondary btn-rounded btn-icon btn-delete">
                                        <i class="far fa-trash-alt"></i>
                                    </button></a>
                                    @endif   
                                    
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
