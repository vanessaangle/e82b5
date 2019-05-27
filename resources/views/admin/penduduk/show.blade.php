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
                                            <td>No KK</td>
                                            <td>:</td>
                                            <td>{{$data->kk}}</td>
                                        </tr>
                                        <tr>
                                            <td>NIK</td>
                                            <td>:</td>
                                            <td>{{$data->nik}}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td>{{$data->nama}}</td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td>{{$data->alamat}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td>:</td>
                                            <td>{{$data->tgl_lahir}}</td>
                                        </tr>
                                        <tr>
                                            <td>Agama</td>
                                            <td>:</td>
                                            <td>{{$data->agama}}</td>
                                        </tr>
                                        <tr>
                                            <td>Golongan Darah</td>
                                            <td>:</td>
                                            <td>{{$data->golongan_darah}}</td>
                                        </tr>
                                        <tr>
                                            <td>Pekerjaan</td>
                                            <td>:</td>
                                            <td>{{$data->pekerjaan}}</td>
                                        </tr>
                                         <tr>
                                            <td>File KTP</td>
                                            <td>:</td>
                                            <td><a href="/{{$data->file_ktp}}">Download KTP</a></td>
                                        </tr>
                                        <tr>
                                            <td>File Kartu Keluarga</td>
                                            <td>:</td>
                                            <td><a href="/{{$data->file_kk}}">Download KK</a></td>
                                        </tr>
                                        <tr>
                                            <td>File Akta</td>
                                            <td>:</td>
                                            <td><a href="/{{$data->file_akta}}">Download Akta</a></td>
                                        </tr>
                                         <tr>
                                            <td>Rastra</td>
                                            <td>:</td>
                                            <td>{{$data->rastra}}</td>
                                        </tr>
                                         <tr>
                                            <td>Pakaian</td>
                                            <td>:</td>
                                            <td>{{$data->pakaian}}</td>
                                        </tr>
                                         <tr>
                                            <td>Kesehatan</td>
                                            <td>:</td>
                                            <td>{{$data->kesehatan}}</td>
                                        </tr>
                                         <tr>
                                            <td>Tempat Tinggal</td>
                                            <td>:</td>
                                            <td>{{$data->tempat_tinggal}}</td>
                                        </tr>
                                         <tr>
                                            <td>Pendidikan</td>
                                            <td>:</td>
                                            <td>{{$data->pendidikan}}</td>
                                        </tr>
                                        <tr>
                                            <td>Kartu Keluarga Sejahtera (KKS) / Kartu Perlindungan Sosial (KPS)</td>
                                            <td>:</td>
                                            <td>{{$data->kks_kps ? 'Ya' : 'Tidak'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Kartu Indonesia Pintar (KIP) / Bantuan Siswa Miskin (BSM)</td>
                                            <td>:</td>
                                            <td>{{$data->kip_bsm ? 'Ya' : 'Tidak'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Kartu Indonesia Sehat (KIS) / BPJS Kesehatan / Jamkesmas</td>
                                            <td>:</td>
                                            <td>{{$data->kis_bpjs ? 'Ya' : 'Tidak'}}</td>
                                        </tr>
                                        <tr>
                                            <td>BPSJ Kesehatan peserta mandiri</td>
                                            <td>:</td>
                                            <td>{{$data->kis_mandiri ? 'Ya' : 'Tidak'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Jaminan sosial tenaga kerja (Jamsostek) / BPJS ketenagakerjaan</td>
                                            <td>:</td>
                                            <td>{{$data->jamsostek ? 'Ya' : 'Tidak'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Asuransi Kesehatan Lainnya</td>
                                            <td>:</td>
                                            <td>{{$data->ansuransi ? 'Ya' : 'Tidak'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Program Keluarga Harapan (PKH)</td>
                                            <td>:</td>
                                            <td>{{$data->pkh ? 'Ya' : 'Tidak'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Beras untuk orang miskin (Raskin)</td>
                                            <td>:</td>
                                            <td>{{$data->raskin ? 'Ya' : 'Tidak'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Kredit Usaha Rakyat (KUR)</td>
                                            <td>:</td>
                                            <td>{{$data->kur ? 'Ya' : 'Tidak'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Status</td>
                                            <td>:</td>
                                            <td>{{$data->status}}</td>
                                        </tr>
                                        @if(Auth::user()->role == 'Operator' && $data->status == 'Belum Verifikasi')
                                            <tr>
                                                <td>Verifikasi</td>
                                                <td>:</td>
                                                <td>
                                                    <button class="btn btn-danger" id="tolak">Tolak</button>
                                                    <button class="btn btn-success" id="verifikasi">Terima</button>
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </tbody>
                            </table>
                        </div>
                        <div class="box-footer">                                
                            <a href="{{ url()->previous() }}" class="btn btn-default">Kembali</a>
                        </div>
                        <form action="{{url('admin/penduduk/'.$data->id.'/tolak')}}" method="POST" id="formTolak">
                            @csrf
                        </form>
                        <form action="{{url('admin/penduduk/'.$data->id.'/terima')}}" method="POST" id="formTerima">
                            @csrf
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
        function tolak(id){
            if(confirm('Apakah anda ingin menolak ?')){

            }
        }
        $('#tolak').on('click', function(){
            if(confirm('Apakah anda ingin melanjutkan ?')){
                $('#formTolak').submit();
            }
        });

        $('#verifikasi').on('click', function(){
            if(confirm('Apakah anda ingin melanjutkan ?')){
                $('#formTerima').submit();
            }
        })
    </script>
@endpush