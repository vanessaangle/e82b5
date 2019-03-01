<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

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
            ['value' => 1,'name ' => 'Aktif'],
            ['value' => 0,'name ' => 'Tidak Aktif']
        ];

        $role = [
            ['value' => 'Admin','name ' => 'Admin'],
            ['value' => 'Operator','name ' => 'Operator']
        ];

        return [
            ['label' => 'Nama Pengguna', 'name' => 'name'],
            ['label' => 'Alamat', 'name' => 'alamat'],
            ['label' => 'Tanggal Lahir','name' => 'tanggal_lahir', 'type' => 'datepicker'],
            ['label' => 'Tempat Lahir','name' => 'tempat_lahir'],
            ['label' => 'Username','name' => 'username'],
            ['label' => 'Password','name' => 'password','type' => 'password'],
            ['label' => 'Status','name' => 'status', 'type' => 'select','option' => $status],
            ['label' => 'Role','name' => 'ro le','type' => 'se lect','option' => $role],
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
        return view('admin.user.index',compact('template','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
