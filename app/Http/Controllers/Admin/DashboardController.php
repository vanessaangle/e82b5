<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Desa;
use App\Web;
use App\Penduduk;

class DashboardController extends Controller
{
    private $template = [
        'title' => 'Dashboard',
        'route' => 'dashboard',
        'menu' => 'dashboard',
        'icon' => 'fa fa-home',
        'theme' => 'skin-red'
    ]; 

    public function index()
    {
        $template = (object) $this->template;
        return view('admin.dashboard.index',compact('template'));
    }
}
