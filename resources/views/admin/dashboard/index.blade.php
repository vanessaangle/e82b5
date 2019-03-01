@extends('admin.layouts.app',[$template])
@push('css')

@endpush
@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                {{$template->title}}
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{route('admin.dashboard.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Home</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->            
            <!-- /.row -->
            <!-- Main row -->
            @if(AppHelper::access(['Admin']))
            <div class="row">
                <div class="col-md-12" style="padding-top:180px">                    
                    <h2><center>SELAMAT DATANG SISTEM INFORMASI GEOGRAFIS PEMETAAN PENDUDUK MISKIN KABUPATEN BADUNG BERBASIS WEB</center></h2>                                    
                </div>                
            </div>
            @else
            
            @endif
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection

@push('js')
    <script src="{{asset('admin-lte')}}/bower_components/chart.js/Chart.js"></script>
@endpush