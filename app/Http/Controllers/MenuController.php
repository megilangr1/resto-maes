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

		public function edit($id)
		{
				try {
					$menu = Menu::orderBy('serve_status', 'DESC')->get();
					$edit = Menu::findOrFail($id);
					return view('menu.index', compact('menu', 'edit'));
				} catch (\Exception $e) {
					return redirect()->back();
				}
		}

		public function update(Request $request, $id)
		{
			$this->validate($request, [
				'name' => 'required|string',
				'price' => 'required|numeric',
				'description' => 'nullable|string',
				'serve_status' => 'required|numeric'
			]);

			try {
				$menu = Menu::findOrFail($id);

				$menu->update([
					'name' => $request->name,
					'price' => $request->price,
					'description' => $request->description,
					'serve_status' => $request->serve_status
				]);

				session()->flash('success', 'Perubahan Data Menu di-Simpan !');
				return redirect(route('menu.index'));
			} catch (\Exception $e) {
				session()->flash('error', 'Terjadi Kesalahan Saat Menyipan Perubahan Data !');
				return redirect()->back();
			}
		}

		public function destroy($id)
		{
			try {
				$menu = Menu::findOrFail($id);
				$menu->delete();

				session()->flash('success', 'Data Menu Berhasil di-Hapus !');
				return redirect(route('menu.index'));
			} catch (\Exception $e) {
				return redirect()->back();
			}
		}
}
