@extends('layouts.admin')
@section('content')
<h1><center>komentar</center></h1>
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">Data Komentar
					<div class="panel-title pull-right"><a href="{{ route('komentar.create') }}">Add ++</a>
				</div>
			</div>
<div class="panel-body">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Isi Komentar</th>
					<th>Tanggal Komentar</th>
					<th>Artikel</th>
					<th colspan="3">Action</th>
				</tr>	
</thead>
<tbody>
	@php $no = 1; @endphp
	@foreach($komentar as $data)
	<tr>
		<td> {{ $no++ }} </td>
		<td> {{ $data->isi }} </td>
		<td><p> {{ $data->tgl_komentar }} </p></td>
		<td><p> {{ $data->Artikel->judul }} </p></td>
	<td>
		<a class="btn btn-primary" href=" {{ route('komentar.edit',$data->id)}} ">Edit</a>
	</td>
	<td>
							<form method="post" action="{{ route('komentar.destroy',$data->id) }}">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
							</form>
						</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection