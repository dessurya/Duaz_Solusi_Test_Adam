@extends('index')

@section('content')
<div class="x_panel">
	<form method="post" action="{{ route('konsumen.simpan') }}">
		<div class="x_title">
			<h3 align="center">Form Konsumen {{ empty($data) ? 'Tambah' : 'Lihat & Ubah' }}</h3>
			<input type="hidden" name="id" value="{{ !empty($data) ? $data->id : ''  }}">
			{{ csrf_field() }}
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						Konsumen
						<input 
							required
							name="konsumen"
							type="text" 
							value="{{ !empty($data) ? $data->konsumen : '' }}" 
							class="form-control">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						Jenis Kendaraan
						<select name="jenis_kendaraan" class="form-control">
							<option value="motor" {{ !empty($data) and $data->jenis_kendaraan == 'motor' ? 'checked' : '' }}>Motor</option>
							<option value="mobil" {{ !empty($data) and $data->jenis_kendaraan == 'mobil' ? 'checked' : '' }}>mobil</option>
						</select>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						No Polisi
						<input 
							required
							name="no_polisi"
							type="text" 
							value="{{ !empty($data) ? $data->no_polisi : '' }}" 
							class="form-control">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						Tanggal Lahir
						<input 
							required
							name="tgl_lahir"
							type="date" 
							value="{{ !empty($data) ? $data->tgl_lahir : '' }}" 
							class="form-control">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						Jenis Kelamin
						<select name="jenis_kelamin" class="form-control">
							<option value="L" {{ !empty($data) and $data->jenis_kelamin == 'L' ? 'checked' : '' }}>L</option>
							<option value="P" {{ !empty($data) and $data->jenis_kelamin == 'P' ? 'checked' : '' }}>P</option>
						</select>
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						No Hp
						<input 
							required
							name="no_hp"
							type="text" 
							value="{{ !empty($data) ? $data->no_hp : '' }}" 
							class="form-control">
					</div>
				</div>
			</div>
			<div style="float: right;">
				<button class="btn btn-success" type="submit">Save</button>
			</div>
			<div class="clearfix"></div>
		</div>
	</form>
</div>
@endsection