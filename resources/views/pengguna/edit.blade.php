@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-inffo">
			  <div class="panel-heading">Edit Data Pengguna
			  	<div class="panel-title pull-right"><a href="{{ route('pengguna.index') }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('pengguna.update',$pengguna->id) }}" method="post" enctype="multipart/form-data" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('nama') ? ' has-error' : '' }}">
			  			<label class="control-label">Nama</label>	
			  			<input type="text" name="nama" class="form-control" value="{{ $pengguna->nama }}"  required>
			  			@if ($errors->has('nama'))
                            <span class="help-block">
                                <strong>{{ $errors->first('nama') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
			  			<label class="control-label">Email</label>	
			  			<input type="text" name="email" class="form-control" value="{{ $pengguna->email }}"  required>
			  			@if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
			  		</div>

					<div class="form-group {{ $errors->has('judul') ? ' has-error' : '' }}">
			  			<label class="control-label">Judul</label>	
			  			<input type="text" name="judul" class="form-control" value="{{ $pengguna->judul }}"  required>
			  			@if ($errors->has('judul'))
                            <span class="help-block">
                                <strong>{{ $errors->first('judul') }}</strong>
                            </span>
                        @endif
			  		</div>
			  
			  		<div class="form-group {{ $errors->has('isi') ? ' has-error' : '' }}">
			  			<label class="control-label">Isi berita</label>	
			  			<textarea type="text" name="isi" class="form-control" value="{{ $pengguna->isi }}"  required></textarea>
			  			@if ($errors->has('isi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('isi') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('tgl_post') ? ' has-error' : '' }}">
			  			<label class="control-label">Tanggal post</label>	
			  			<input type="date" name="tgl_post" class="form-control" value="{{ $pengguna->tgl_post }}"  required>
			  			@if ($errors->has('tgl_post'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tgl_post') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('gambar') ? ' has-error' : '' }}">
			  			<label class="control-label col-md-3 col-sm-3 col-xs-3  ">Gambar</label>
			  			<div class="col-md-9 pr-1">	
			  			<input type="file" name="gambar" class="form-control" value="{{ $pengguna->gambar }}"  required>
			  			@if (isset($pengguna) && $pengguna->gambar)
                                            <p>
                                                <br>
                                            <img src="{{ asset('/assets/images/avatar/'.$pengguna->gambar) }}" style="width:100px; height:100px;" alt="">
                                            </p>
                            <span class="help-block">
                                <strong>{{ $errors->first('gambar') }}</strong>
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