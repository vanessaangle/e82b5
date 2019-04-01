@extends('admin.layouts.app')
@push('css')

@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{$template->title}}                
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.dashboard.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">{{$template->title}}</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
           <div class="row">
                <div class="col-md-12">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"><i class="{{$template->icon}}"></i> Form Tambah {{$template->title}}</h3>                            
                        </div>
                        <form action="{{route("$template->route".".store")}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="box-body">                            
                                @foreach($form as $value)
                                    {!!Render::form($value)!!}
                                @endforeach
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <a href="{{ url()->previous() }}" class="btn btn-default">Kembali</a>
                            </div>
                        </form>
                    </div>
                </div>
           </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
@push('js')
    <!-- page script -->
    <script>
    $(function () {
        $('#datatables').DataTable()
        $('#full-datatables').DataTable({
        'paging'      : true,
        'lengthChange': false,
        'searching'   : false,
        'ordering'    : true,
        'info'        : true,
        'autoWidth'   : false
        })
    })
    </script>
    <script>
        var map, marker;
         function initMap(){
            console.log('INIT MAP');
            var myLatLng = {lat: -8.604342, lng: 115.188044};         
            $('.lat').val(myLatLng.lat);
            $('.lng').val(myLatLng.lng); 
            map = new google.maps.Map(document.getElementById('google_map'), {
                zoom: 12,
                center: myLatLng
            });  

            marker = new google.maps.Marker({
                position: myLatLng,
                map: map,
                draggable:true,
                title: 'Lokasi Desa'
            });

            google.maps.event.addListener(map,'click', function(event){
                marker.setPosition(event.latLng);
                console.log(event);
                $('.lat').val(event.latLng.lat);
                $('.lng').val(event.latLng.lng);                
            });
        }
    </script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyDX5i1N1RR3DSQTIRu0ZbIyTgorg7Rhg_g&callback=initMap"></script>
@endpush