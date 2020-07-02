@extends('index')

@section('content')
@if(Session::has('info'))
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="alert alert-danger alert-dismissible fade in" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
			</button>
			<strong>{{ Session::get('info') }}</strong>
		</div>
	</div>
</div>
@endif
<div class="x_panel">
	<form method="post" action="{{ route('transaksi.simpan') }}">
		<div class="x_title">
			<h3 align="center">Form Transaksi {{ empty($data) ? 'Tambah' : 'Lihat & Ubah' }}</h3>
			<input type="hidden" name="id" value="{{ !empty($data) ? $data->id : ''  }}">
			{{ csrf_field() }}
			<div class="clearfix"></div>
		</div>
		<div class="x_content">
			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						No Polisi
						<input  
							{{ empty($data) ? 'required' : 'readonly' }}
							name="no_polisi"
							type="text" 
							value="{{ !empty($data) ? $data->no_polisi : '' }}" 
							class="form-control">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						Tanggal Transaksi
						<input 
							{{ empty($data) ? 'required' : 'readonly' }}
							name="tgl_masuk"
							type="date" 
							value="{{ !empty($data) ? $data->tgl_masuk : date('Y-m-d') }}" 
							class="form-control">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						Waktu Masuk
						<input 
							{{ empty($data) ? 'required' : 'readonly' }}
							name="waktu_masuk"
							type="time" 
							value="{{ !empty($data) ? $data->waktu_masuk : '' }}" 
							class="form-control">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						Waktu Keluar
						<input 
							@if(empty($data) or !empty($data->biaya) )
							readonly
							@elseif(!empty($data))
							required
							@endif
							name="waktu_keluar"
							type="time" 
							value="{{ !empty($data) ? $data->waktu_keluar : '' }}" 
							class="form-control">
					</div>
				</div>
				<div class="col-sm-6">
					<div class="form-group">
						Biaya
						<input 
							readonly 
							type="text" 
							value="{{ !empty($data) ? $data->biaya : '' }}" 
							class="form-control">
					</div>
				</div>
			</div>
			@if(empty($data) or empty($data->biaya) )
			<div style="float: right;">
				<button class="btn btn-success" type="submit">Save</button>
			</div>
			@endif
			<div class="clearfix"></div>
		</div>
	</form>
</div>
@endsection