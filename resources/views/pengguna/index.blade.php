@extends('layouts.admin')
@section('content')
<h1><center>Pengguna</center></h1>

<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title pull-right">
				</div>
			</div>
<div class="panel-body">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Email</th>
				</tr>	
</thead>
<tbody>
	@php $no = 1; @endphp
	@foreach($pengguna as $data)
	<tr>
		<td> {{ $no++ }} </td>
		<td> {{ $data->name }} </td>
		<td><p> {{ $data->email }} </p></td>
	<td>
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