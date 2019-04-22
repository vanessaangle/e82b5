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
                    {!!Alert::showBox()!!}
                    <div class="box box-info">
                        <div class="box-header">
                            <h3 class="box-title"><i class="{{$template->icon}}"></i> List {{$template->title}}</h3>
                            <a href="{{route("$template->route".'.create')}}" class="btn btn-primary pull-right">
                                <i class="fa fa-pencil"></i> Tambah {{$template->title}}
                            </a>
                        </div>
                        <div class="box-body">
                            <table class="table" id="datatables">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Agama</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $key => $row)
                                        <tr>
                                            <td>{{$row->nik}}</td>
                                            <td>{{$row->nama}}</td>
                                            <td>{{$row->alamat}}</td>
                                            <td>{{$row->tgl_lahir}}</td>
                                            <td>{{$row->agama}}</td>
                                            <td>{{$row->status}}</td>
                                            <td>
                                                <a href="{{route("$template->route".'.edit',[$row->id])}}" class="btn btn-success btn-sm">Ubah</a>
                                                <a href="{{route("$template->route".'.show',[$row->id])}}" class="btn btn-info btn-sm">Lihat</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
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