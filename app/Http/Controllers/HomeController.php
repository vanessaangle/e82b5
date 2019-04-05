<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Desa;
use App\Penduduk;
use App\Web;
use App\Helpers\AppHelper;
use DB;
use Alert;
class HomeController extends Controller
{
    private function form()
    {
        $desa = Desa::select(DB::raw('id as value, nama_desa as name'))
            ->get();
        $agama  = [
            ['value' => 'Hindu','name' => 'Hindu'],
            ['value' => 'Islam','name' => 'Islam'],
            ['value' => 'Kristen','name' => 'Kristen'],
            ['value' => 'Protestan','name' => 'Protestan'],
            ['value' => 'Budha','name' => 'Budha'],
        ];
        $golongan = [
            ['value' => 'A','name' => 'A' ],
            ['value' => 'B','name' => 'B' ],
            ['value' => 'O','name' => 'O' ],
            ['value' => 'AB','name' => 'AB'],
        ];
        $options = [
            ['value' => '0','name' => 'Tidak'],
            ['value' => '1','name' => 'Ya'],
        ];

        return [
            ['label' => 'Nomor Kartu Keluarga (KK)','name' => 'kk'],
            ['label' => 'Nomor Induk Kewarganegaraan (NIK)','name' => 'nik'],
            ['label' => 'Nama','name' => 'nama'],
            ['label' => 'Alamat','name' => 'alamat'],
            ['label' => 'Tanggal Lahir','name' => 'tgl_lahir','type' => 'datepicker'],
            ['label' => 'Agama','name' => 'agama','type' => 'select', 'option' => $agama],
            ['label' => 'Golongan Darah','name' => 'golongan_darah', 'type' => 'select', 'option' => $golongan],
            ['label' => 'Pekerjaan','name' => 'pekerjaan'],
            ['label' => 'Scan KTP','name' => 'file_ktp', 'type' => 'file', 'required' => ['create']],
            ['label' => 'Scan Kartu Keluarga','name' => 'file_kk', 'type' => 'file', 'required' => ['create']],
            ['label' => 'Scan Akta Kelahiran','name' => 'file_akta', 'type' => 'file', 'required' => ['create']],
            ['label' => 'Rastra','name' => 'rastra'],
            ['label' => 'Pakaian','name' => 'pakaian'],
            ['label' => 'Kesehatan','name' => 'kesehatan'],
            ['label' => 'Tempat Tinggal','name' => 'tempat_tinggal'],
            ['label' => 'Pendidikan','name' => 'pendidikan'],
            ['label' => 'Status','name' => 'status','type' => 'hidden', 'value' => 'Belum Verifikasi'],            
            ['label' => 'Desa','name' => 'desa_id','type' => 'select','option' => $desa],
        ];
    }
    public function index()
    {
        $data = Web::first();
        $form = (object) $this->form();

        $desa = Desa::all();
        $penduduk = [];
        foreach($desa as $d){
            $penduduk[] = [
                'lat' => $d->lat,
                'lng' => $d->lng,
                'title' => "Desa ".$d->nama_desa." (".count($d->penduduk)." Penduduk Miskin)"
            ];
        }
        $penduduk = json_encode($penduduk);
        return view('web.index', compact('data','form','penduduk'));
    }

    public function post(Request $request){
        $this->validate($request,[
            'kk' => 'required|unique:penduduk,kk',
            'nik' => 'required|unique:penduduk,nik',
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'golongan_darah' => 'required',
            'pekerjaan' => 'required',
            'file_ktp' => 'required',
            'file_kk' => 'required',
            'file_akta' => 'required',
            'rastra' => 'required',
            'pakaian' => 'required',
            'kesehatan' => 'required',
            'tempat_tinggal' => 'required',
            'pendidikan' => 'required',
            'status' => 'required',
            'desa_id' => 'required'
        ]);
        $data = $request->all();
        $uploaded = AppHelper::uploader($this->form(),$request);
        $data['file_ktp'] = $uploaded['file_ktp'];
        $data['file_kk'] = $uploaded['file_kk'];
        $data['file_akta'] = $uploaded['file_akta'];
        $data['user_id'] = auth()->user()->id;
        Penduduk::create($data);
        Alert::make('success','Berhasil menyimpan data');
        return back();
    }
}
