<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
		{
			$menu = Menu::orderBy('serve_status', 'DESC')->get();
			return view('menu.index', compact('menu'));
		}

		public function store(Request $request)
		{
			$this->validate($request, [
				'name' => 'required|string',
				'price' => 'required|numeric',
				'description' => 'nullable|string',
				'serve_status' => 'required|numeric'
			]);

			try {
				$menu = Menu::firstOrCreate([
					'name' => $request->name,
					'price' => $request->price,
					'description' => $request->description,
					'serve_status' => $request->serve_status
				]);

				session()->flash('success', 'Berhasil Menambah Data Menu !');
				return redirect(route('menu.index'));
			} catch (\Exception $e) {
				session()->flash('error', 'Terjadi Kesalahan Saat Menyipan Data !');
				return redirect()->back();
			}
		}
}
