@extends('index')

@section('content')
<a class="btn btn-info" href="{{ route('konsumen.tambah') }}">Tambah Data</a>
<table class="table table-striped table-bordered no-footer" width="100%">
	<thead>
		<tr>
			<th>Konsumen</th>
			<th>Jenis Kendaraan</th>
			<th>No Polisis</th>
			<th>Tanggal Lahir</th>
			<th>Kelamin</th>
			<th>No Hp</th>
			<th>Tindakan</th>
		</tr>
	</thead>
	<tbody>
		@foreach($konsumen as $data)
		<tr>
			<td>{{ $data->konsumen }}</td>
			<td>{{ $data->jenis_kendaraan }}</td>
			<td>{{ $data->no_polisi }}</td>
			<td>{{ $data->tgl_lahir }}</td>
			<td>{{ $data->jenis_kelamin }}</td>
			<td>{{ $data->no_hp }}</td>
			<td>
				<a class="btn btn-info" href="{{ route('konsumen.lihat', ['id' => $data->id]) }}">Lihat</a>&nbsp;
				<a class="btn btn-danger" href="{{ route('konsumen.hapus', ['id' => $data->id]) }}">Hapus</a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>
@endsection