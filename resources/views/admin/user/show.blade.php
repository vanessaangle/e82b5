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
                <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> Home</a></li>
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
                            <h3 class="box-title"><i class="{{$template->icon}}"></i> Detail {{$template->title}}</h3>                            
                        </div>
                        <div class="box-body">  
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th style="width:200px"></th>
                                        <th style="width:20px"></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tbody>                                                                                       
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td>{{$data->nama}}</td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td>:</td>
                                            <td>{{$data->email}}</td>
                                        </tr>
                                        <tr>
                                            <td>Telepon</td>
                                            <td>:</td>
                                            <td>{{$data->telepon}}</td>
                                        </tr>
                                        <tr>
                                            <td>Role</td>
                                            <td>:</td>
                                            <td>{{$data->role}}</td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>:</td>
                                            <td>{{$data->jenis_kelamin}}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td>{{$data->status == 1 ? 'Aktif' : 'Tidak Aktif'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Foto</td>
                                            <td>:</td>
                                            <td><img src="{{asset('image/'.$data->foto)}}" width="300px" alt=""/></td>
                                        </tr>
                                    </tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">                                
                            <a href="{{ url()->previous() }}" class="btn btn-default">Kembali</a>
                        </div>
                        
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
@endpush