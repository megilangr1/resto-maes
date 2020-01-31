<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
		{
			$menu = Menu::orderBy('serve_status')->get();
			return view('menu.index', compact('menu'));
		}
}
