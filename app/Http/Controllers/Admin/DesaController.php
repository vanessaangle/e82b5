<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Desa;
use Carbon\Carbon;
use Alert;

class DesaController extends Controller
{
    private $template = [
        'title' => 'Desa',
        'route' => 'desa',
        'menu' => 'desa',
        'icon' => 'fa fa-map',
        'theme' => 'skin-red'
    ];
    
    private function form()
    {
        return [
            ['label' => 'Nama Desa', 'name' => 'nama_desa'],
            ['label' => 'Status Desa', 'name' => 'status_desa'],
            ['label' => 'Lokasi Desa', 'type' => 'map' ,'hideAdd' => false],
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
        return view('admin.desa.index',compact('template','data'));
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
            'nama_desa' => 'required|unique:desa,nama_desa',
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
