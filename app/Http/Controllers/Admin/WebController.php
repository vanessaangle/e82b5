<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Web;

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
            ['label' => 'Banner', 'name' => 'gambar_depan', 'type' => 'file'],
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
}
