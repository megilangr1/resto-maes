@extends('layouts.app')

@section('content')
<div class="col-md-12">
	<div class="card card-primary" style="border-radius: 0px;">
		<div class="card-header">
			{{-- <h5 class="card-title m-0">
				Data Menu Makanan
			</h5> --}}
			<ul class="nav nav-tabs card-header-tabs">
				<li class="nav-item">
					<a href="javascript:void(0)" class="nav-link active">
						Data Menu
					</a>
				</li>
				<li class="nav-item">
					<a href="javascript:void(0)" class="nav-link">
						Form Tambah
					</a>
				</li>
			</ul>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Nama Menu</th>
							<th>Deskripsi</th>
							<th>Harga</th>
							<th width="10%">Tersedia</th>
							<th width="10%">Aksi</th>
						</tr>
					</thead>
					<tbody>
						
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection