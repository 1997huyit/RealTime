@extends('master')
@section('customcss')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<style type="text/css">
  .btnmt{
    width: 80%;
    height: 40px;
  }
</style>
@endsection
@section('customjs')
<script type="text/javascript">
    $(document).ready(function() {
    $('.js-example-basic-single').select2();
    $(".js-example-theme-single").select2({
  theme: "classic"
});
});
</script>

@endsection
@section('content')
<div class="card">
    <div class="card-body">
        @if( Auth::user()->user_type_id == 2)
        <a href="{{route('coordinator.order.create')}}">
        @elseif( Auth::user()->user_type_id == 3)
        <a href="{{route('seller.order.create')}}">
        @endif
            <button type="button" class="btn btn-primary btn-rounded btn-fw btn-create-user">Thêm đơn hàng</button>
        </a>
        <div id="order" class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <Leaderboard :current="{{ auth()->user() ? auth()->user()->id : 0 }}"></Leaderboard>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
