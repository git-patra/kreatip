<?php

namespace App\Http\Controllers\dashboard;

use App\Menu;
use App\Submenu;
use App\Submenu_child;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $menus = Menu::all();
        $submenus = Submenu::all();
        $submenuchildren = Submenu_child::all();

        return view('dashboard/index', [
            'menus' => $menus,
            'submenus' => $submenus,
            'submenuchildren' => $submenuchildren
        ]);
    }
}
