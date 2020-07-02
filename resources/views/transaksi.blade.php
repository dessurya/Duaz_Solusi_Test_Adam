@extends('index')

@section('content')
<a class="btn btn-info" href="{{ route('transaksi.tambah') }}">Tambah Data</a>
<table class="table table-striped table-bordered no-footer" width="100%">
	<thead>
		<tr>
			<th>Konsumen</th>
			<th>No Polisis</th>
			<th>Masuk</th>
			<th>Keluar</th>
			<th>Biaya</th>
			<th>Tindakan</th>
		</tr>
	</thead>
	<tbody>
		@foreach($transaksi as $data)
		<tr>
			<td>{{ $data->konsumen }}</td>
			<td>{{ $data->no_polisi }}</td>
			<td>{{ $data->waktu_masuk }}</td>
			<td>{{ $data->waktu_keluar }}</td>
			<td>{{ $data->biaya }}</td>
			<td>
				<a class="btn btn-info" href="{{ route('transaksi.lihat', ['id' => $data->id]) }}">Lihat</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection