@extends('layouts.app')

@section('content')
<div class="col-md-12">
	@if (session('error'))
	<div class="alert alert-danger alert-dismissible fade show" role="alert">
		<strong>ERROR !</strong> <br>
		{{ session('error') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif

	@if (session('success'))
	<div class="alert alert-success alert-dismissible fade show" role="alert">
		<strong>Success !</strong> <br>
		{{ session('success') }}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>
	@endif

	<div class="card card-primary" style="border-radius: 0px;">
		<div class="card-header">
			<ul class="nav nav-tabs card-header-tabs">
				<li class="nav-item">
					<a href="#table-menu" id="data-menu" class="nav-link {{ $errors->has('name') || $errors->has('description') || $errors->has('price') || $errors->has('serve_status')  ? '':'active' }}" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="table-menu" onclick="dataActive()">
						Data Menu
					</a>
				</li>
				<li class="nav-item">
					<a href="#form-menu" id="form-tambah" class="nav-link {{ $errors->has('name') || $errors->has('description') || $errors->has('price') || $errors->has('serve_status')  ? 'active':'' }}" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="form-menu" onclick="formActive()">
						Form Menu
					</a>
				</li>
			</ul>
		</div>
		<div class="card-body">
			<div id="accordion">
				<div class="collapse {{ $errors->has('name') || $errors->has('description') || $errors->has('price') || $errors->has('serve_status')  ? '':'show' }}" id="table-menu" data-parent="#accordion">
					<div class="table-responsive">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>#</th>
									<th>Nama Menu</th>
									<th>Deskripsi</th>
									<th>Harga</th>
									<th width="15%" class="text-center">Tersedia</th>
									<th width="10%" class="text-center">Aksi</th>
								</tr>
							</thead>
							<tbody>
								@forelse ($menu as $item)
									<tr>
										<td>{{ $loop->iteration }}</td>
										<td>{{ $item->name }}</td>
										<td>{{ $item->description }}</td>
										<td>{{ 'Rp. '.number_format($item->price, 0, ',', '.') }}</td>
										<td class="text-center">
											<button class="btn btn-sm {{ $item->serve_status ? 'btn-success':'btn-warning' }}">
												{{ $item->serve_status ? 'Tersedia':'Tidak Tersedia' }}
											</button>
										</td>
										<td class="text-center">
											<a href="#" class="btn btn-sm btn-danger">
												Hapus
											</a>
										</td>
									</tr>
								@empty
									<tr>
										<td colspan="6">
											Belum Ada Menu !
										</td>
									</tr>
								@endforelse
							</tbody>
						</table>
					</div>
				</div>
				<div class="collapse {{ $errors->has('name') || $errors->has('description') || $errors->has('price') || $errors->has('serve_status')  ? 'show':'' }}" id="form-menu" data-parent="#accordion">
					<form action="{{ route('menu.store') }}" method="post">
						@csrf
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="">Nama Menu :</label>
									<input type="text" name="name" id="name" class="form-control {{ $errors->has('name') ? 'is-invalid':'' }}" required autofocus placeholder="Masukan Nama Menu.." autocomplete="off" value="{{ old('name') }}">
									<p class="text-danger text-sm">
										{{ $errors->first('name') }}
									</p>
								</div>
							</div>
							<div class="col-md-3">
								<div class="form-group">
									<label for="">Harga : </label>
									<div class="input-group">
										<div class="input-group-prepend">
											<span class="input-group-text" style="border-radius: 0px;">Rp. </span>
										</div>
										<input type="number" name="price" id="price" class="form-control {{ $errors->has('price') ? 'is-invalid':'' }}" required placeholder="Masukan Harga Menu.." value="{{ old('price') }}">
									</div>
									<p class="text-danger text-sm">
										{{ $errors->first('price') }}
									</p>
								</div>
							</div>
							<div class="col-md-5">
								<div class="form-group">
									<label for="">Ketersediaan</label>
									<select name="serve_status" id="serve_status" class="form-control {{ $errors->has('serve_status') ? 'is-invalid':'' }}" required>
										<option value="">Pilih Ketersediaan Menu</option>
										<option value="1" {{ old('serve_status') == 1 ? 'selected':'' }}>Tersedia</option>
										<option value="0" {{ old('serve_status') == 2 ? 'selected':'' }}>Tidak Tersedia</option>
									</select>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<label for="">Deskripsi</label>
									<textarea name="description" id="description" cols="10" rows="4" class="form-control" placeholder="Masukan Deskripsi Menu..">{{ old('description') }}</textarea>
								</div>
							</div>
							<div class="col-md-12">
								<button type="submit" class="btn btn-success flat">
									Tambah Data Menu
								</button>
								<button type="reset" class="btn btn-danger flat">
									Reset Input
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>


<script>
	function formActive() {
		var ele = document.getElementById('form-tambah');
		var ele2 = document.getElementById('data-menu');
		
		if (ele2.classList.contains('active')) {
			ele.classList.add('active');
		} else {
			ele.classList.remove('active');
		}

		if (ele2.classList.contains('active')) {
			ele2.classList.remove('active');
		}
	}

	function dataActive() {
		var ele2 = document.getElementById('data-menu');
		var ele = document.getElementById('form-tambah');

		ele2.classList.add('active');

		if (ele.classList.contains('active')) {
			ele.classList.remove('active');
		}
	}
</script>
@endsection