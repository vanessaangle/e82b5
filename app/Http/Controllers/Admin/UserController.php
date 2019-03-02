<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Alert;

class UserController extends Controller
{
    private $template = [
        'title' => 'User',
        'route' => 'user',
        'menu' => 'user',
        'icon' => 'fa fa-users',
        'theme' => 'skin-red'
    ];
    
    private function form()
    {
        $status = [
            ['value' => 1,'name' => 'Aktif'],
            ['value' => 0,'name' => 'Tidak Aktif']
        ];

        $role = [
            ['value' => 'Admin','name' => 'Admin'],
            ['value' => 'Operator','name' => 'Operator']
        ];

        return [
            ['label' => 'Nama Pengguna', 'name' => 'nama'],
            ['label' => 'Alamat', 'name' => 'alamat'],
            ['label' => 'Telepon / Handphone', 'name' => 'telepon'],
            ['label' => 'Tanggal Lahir','name' => 'tanggal_lahir', 'type' => 'datepicker'],
            ['label' => 'Tempat Lahir','name' => 'tempat_lahir'],
            ['label' => 'Username','name' => 'username'],
            ['label' => 'Password','name' => 'password','type' => 'password'],
            ['label' => 'Status','name' => 'status', 'type' => 'select','option' => $status],
            ['label' => 'Role','name' => 'role','type' => 'select','option' => $role],
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
        $data = User::all();
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
        return view('admin.user.create',compact('template','form'));
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
            'username' => 'required|unique:user',
            'password' => 'required|confirmed|min:6',
            'nama' => 'required',
            'alamat' => 'required',
            'telepon' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'role' => 'required'
        ]);
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['tanggal_lahir'] = Carbon::parse($request->tanggal_lahir)->format('Y-m-d');
        User::create($data);
        Alert::make('success','Berhasil  simpan data');
        return redirect(route('user.index'));
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
        $data = User::findOrFail($id);
        return view('admin.user.show',compact('template','data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        $template = (object)$this->template;
        $form = $this->form();
        return view('admin.user.edit',compact('template','form','data')); 
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
            'username' => "required|unique:user,username,$id",
            'password' => 'nullable|confirmed|min:6'
        ]);
        $data = $request->all();
        if($request ->password == ''){
             unset($data['password']);
        }else{
              $data['password'] = bcrypt($request->password);
        }
        User::find($id)->update($data);
        Alert::make('success','Berhasil mengubah data');
        return redirect(route('user.index'));
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
