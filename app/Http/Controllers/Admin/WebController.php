<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Web;
use App\Helpers\AppHelper;
use App\Helpers\Alert;

class WebController extends Controller
{
    private $template = [
        'title' => 'Web',
        'route' => 'web',
        'menu' => 'web',
        'icon' => 'fa fa-globe',
        'theme' => 'skin-red'
    ];

    private function form()
    {
        return [
            ['label' => 'Banner', 'name' => 'gambar_depan', 'type' => 'file' , 'required' => 'false'],
            ['label' => 'Tentang','name' => 'tentang','type' => 'ckeditor'],
            ['label' => 'Telepon', 'name' => 'telepon'],
            ['label' => 'Email','name' => 'email','type' => 'email'],
            ['label' => 'Alamat','name' => 'alamat','type' => 'textarea']
        ];
    }

    public function index()
    {
        $template = (object) $this->template;
        $form = $this->form();
        $data = Web::get()->first();
        return view('admin.web.edit',compact('template','form','data'));
    }

    public function update(Request $request,$id)
    {
        $this->validate($request,[
            'tentang' => 'required',
            'telepon' => 'required',
            'email' => 'required',
            'alamat' => 'required'
        ]);
        $web = Web::findOrFail($id);
        $data = $request->all();
        $uploaded = AppHelper::uploader($this->form(),$request);
        $data['gambar_depan'] = array_key_exists('gambar_depan',$uploaded) ? $uploaded['gambar_depan'] : $web->gambar_depan;
        $web->update($data);
        Alert::make('success','Berhasil menyimpan data');
        return redirect(route('web.index'));
    }
}
