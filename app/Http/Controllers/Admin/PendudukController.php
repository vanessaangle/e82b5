<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Penduduk;
use Carbon\Carbon;
use App\Desa;
use Alert;

class DesaController extends Controller
{
    private $template = [
        'title' => 'Penduduk',
        'route' => 'penduduk',
        'menu' => 'Penduduk',
        'icon' => 'fa fa-group',
        'theme' => 'skin-red'
    ];
    
    private function form()
    {
        $desa = Desa::select('id as value, nama_desa as name')
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
        return [
            ['label' => 'Nomor Kartu Keluarga (KK)','name' => 'kk'],
            ['label' => 'Nomor Induk Kewarganegaraan (NIK)','name' => 'nik'],
            ['label' => 'Nama','name' => 'nama'],
            ['label' => 'Alamat','name' => 'alamat'],
            ['label' => 'Tanggal Lahir','name' => 'tgl_lahir','type' => 'datepicker'],
            ['label' => 'Agama','name' => 'agama','type' => 'select', 'option' => $agama],
            ['label' => 'Golongan Darah','name' => 'golongan_darah', 'type' => 'select', 'option' => $golongan],
            ['label' => 'Pekerjaan','name' => 'pekerjaan'],
            ['label' => 'Scan KTP','name' => 'file_ktp', 'type' => 'file'],
            ['label' => 'Scan Kartu Keluarga','name' => 'file_kk', 'type' => 'file'],
            ['label' => 'Scan Akta Kelahiran','name' => 'file_akta', 'type' => 'file'],
            ['label' => 'Rastra','name' => 'rastra'],
            ['label' => 'Pakaian','name' => 'pakaian'],
            ['label' => 'Kesehatan','name' => 'kesehatan'],
            ['label' => 'Tempat Tinggal','name' => 'tempat_tinggal'],
            ['label' => 'Pendidikan','name' => 'pendidikan'],
            ['label' => 'Status','name' => 'status'],
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
        $data = Desa::all();
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
        return view('admin.desa.create',compact('template','form'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_desa' => 'required',
            'status_desa' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        ]);
        $data = $request->all();
        Desa::create($data);
        Alert::make('success','Berhasil menyimpan data');
        return redirect(route('desa.index'));
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
        $data = Desa::findOrFail($id);
        return view('admin.desa.show',compact('template','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Desa::findOrFail($id);
        $template = (object)$this->template;
        $form = $this->form();
        return view('admin.desa.edit',compact('template','form','data')); 
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
        $request->validate([
            'nama_desa' => 'required',
            'status_desa' => 'required',
            'lat' => 'required',
            'lng' => 'required'
        ]);
        $data = $request->all();
        Desa::find($id)->update($data);
        Alert::make('success','Berhasil mengubah data');
        return redirect(route('desa.index'));
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
