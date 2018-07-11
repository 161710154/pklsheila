@extends('layouts.admin')
@section('content')
<h1><center>Artikel</center></h1>

<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-info">
				<div class="panel-heading">
					<div class="panel-title pull-right"><a href="{{ route('artikel.create') }}">Add ++</a>
				</div>
			</div>
<div class="panel-body">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Judul</th>
					<th>Isi Berita</th>
					<th>Gambar</th>
					<th>Tanggal Post</th>
					<th>Status</th>
					<th colspan="3">Action</th>
				</tr>	
</thead>
<tbody>
	@php $no = 1; @endphp
	@foreach($artikel as $data)
	<tr>
		<td> {{ $no++ }} </td>
		<td> {{ $data->judul }} </td>
		<td><p> {{ $data->isi }} </p></td>
		<td><img src="{{ asset('/assets/images/avatar/'.$data->gambar.'') }}" style="max-width: 80px;"></td>
		<td><p> {{ $data->tgl_post }} </p></td>
		<td><p> {{ $data->status }} </p></td>	
	<td>
		<a class="btn btn-primary" href=" {{ route('artikel.edit',$data->id)}} ">Edit</a>
	</td>
	<td>
							<form method="post" action="{{ route('artikel.destroy',$data->id) }}">
								<input name="_token" type="hidden" value="{{ csrf_token() }}">
								<input type="hidden" name="_method" value="DELETE">

								<button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
								 @if($data->status == 1)
                                <form action="{{ route('artikel.publish',$data->id) }}" method="post">
                                    @csrf
                                <button type="submit" class="btn btn-warning">unPublish</button>
                                </form>
                                @elseif($data->publish == 0)
                                <form action="{{ route('artikel.publish',$data->id) }}" method="post">
                                @csrf
                                    <button class="btn btn-info" type="submit">Publish</button>
                                </form>
                                </td>
                                @endif
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