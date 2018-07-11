
@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-info">
			  <div class="panel-heading">
			  	<div class="panel-title pull-right"><a href="{{ route('artikel.index') }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('artikel.store') }}" method="post" enctype="multipart/form-data" >
			  		{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
			  			<label class="control-label">Judul</label>	
			  			<input type="text" name="judul" class="form-control"  required>
			  			@if ($errors->has('judul'))
                            <span class="help-block">
                                <strong>{{ $errors->first('judul') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('isi') ? ' has-error' : '' }}">
			  			<label class="control-label">Isi Berita</label>	
			  			<textarea type="text" name="isi" class="form-control"  required></textarea>
			  			@if ($errors->has('isi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('isi') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('gambar') ? ' has-error' : '' }}">
			  			<label class="control-label col-md-3 col-sm-3 col-xs-3  ">Gambar</label>
			  			<div class="col-md-9 pr-1">
			  			<input type="file" name="gambar" class="form-control"  required>
			  			@if ($errors->has('gambar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('gambar') }}</strong>
                            </span>
                        @endif
			  		</div>
			  		</div>

			  		<div class="form-group {{ $errors->has('tgl_post') ? ' has-error' : '' }}">
			  			<label class="control-label">Tanggal Post</label>	
			  			<input type="date" name="tgl_post" class="form-control"  required>
			  			@if ($errors->has('tgl_post'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tgl_post') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
			  			<label class="control-label">Status</label>	
			  			<input type="text" name="status" class="form-control"  required>
			  			@if ($errors->has('status'))
                            <span class="help-block">
                                <strong>{{ $errors->first('status') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		
			  		<div class="form-group">
			  			<button type="submit" class="btn btn-primary">Tambah</button>
			  		</div>
			  	</form>
			  </div>
			</div>	
		</div>
	</div>
</div>
@endsection