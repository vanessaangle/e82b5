<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Penduduk;
use Carbon\Carbon;
use App\Helpers\AppHelper;
use App\Desa;
use Alert;
use DB;

class PendudukController extends Controller
{
    private $template = [
        'title' => 'Penduduk',
        'route' => 'penduduk',
        'menu' => 'penduduk',
        'icon' => 'fa fa-group',
        'theme' => 'skin-red'
    ];
    
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
            ['label' => 'Status','name' => 'status'],
            ['label' => 'Kartu Keluarga Sejahtera (KKS) / Kartu Perlindungan Sosial (KPS)', 'name' => 'kks_kps', 'type' => 'select', 'option' => $options],
            ['label' => 'Kartu Indonesia Pintar (KIP) / Bantuan Siswa Miskin (BSM)', 'name' => 'kip_bsm', 'type' => 'select', 'option' => $options],
            ['label' => 'Kartu Indonesia Sehat (KIS) / BPJS Kesehatan / Jamkesmas', 'name' => 'kis_bpjs', 'type' => 'select', 'option' => $options],
            ['label' => 'BPSJ Kesehatan peserta mandiri', 'name' => 'bpjs_mandiri', 'type' => 'select', 'option' => $options],
            ['label' => 'Jaminan sosial tenaga kerja (Jamsostek) / BPJS ketenagakerjaan','name' => 'jamsostek', 'type' => 'select', 'option' => $options],
            ['label' => 'Asuransi Kesehatan Lainnya','name' => 'ansuransi', 'type' => 'select', 'option' => $options],
            ['label' => 'Program Keluarga Harapan (PKH)','name' => 'pkh', 'type' => 'select', 'option' => $options],
            ['label' => 'Beras untuk orang miskin (Raskin)','name' => 'raskin', 'type' => 'select', 'option' => $options],
            ['label' => 'Kredit Usaha Rakyat (KUR)','name' => 'kur', 'type' => 'select', 'option' => $options],
            ['label' => 'Desa','name' => 'desa_id','type' => 'select','option' => $desa],
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $template = (object) $this->template;
        $data = Penduduk::all();
        return view('admin.penduduk.index',compact('template','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $template = (object)$this->template;
        $form = $this->form();
        return view('admin.penduduk.create',compact('template','form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'kk' => 'required',
            'nik' => 'required',
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
        return redirect(route('penduduk.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $template = (object)$this->template;
        $data = Penduduk::findOrFail($id);
        return view('admin.penduduk.show',compact('template','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Penduduk::findOrFail($id);
        $template = (object)$this->template;
        $form = $this->form();
        return view('admin.penduduk.edit',compact('template','form','data')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'kk' => 'required',
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'tgl_lahir' => 'required',
            'agama' => 'required',
            'golongan_darah' => 'required',
            'pekerjaan' => 'required',
            'rastra' => 'required',
            'pakaian' => 'required',
            'kesehatan' => 'required',
            'tempat_tinggal' => 'required',
            'pendidikan' => 'required',
            'status' => 'required',
            'desa_id' => 'required'
        ]);
        $data = $request->all();
        $penduduk = Penduduk::find($id);
        $uploaded = AppHelper::uploader($this->form(),$request);
        $data['file_ktp'] = array_key_exists('file_ktp',$uploaded) ? $uploaded['file_ktp'] : $penduduk->file_ktp;
        $data['file_kk'] = array_key_exists('file_kk',$uploaded) ? $uploaded['file_kk'] : $penduduk->file_kk;
        $data['file_akta'] = array_key_exists('file_akta',$uploaded) ? $uploaded['file_akta'] : $penduduk->file_akta;
        $penduduk->update($data);
        Alert::make('success','Berhasil menyimpan data');
        return redirect(route('penduduk.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
