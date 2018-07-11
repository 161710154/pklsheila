@extends('layouts.admin')
@section('content')

<body style="background-color: thistle">

<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-inffo">
			  <div class="panel-heading">Edit Data Komentar
			  	<div class="panel-title pull-right"><a href="{{ route('komentar.index') }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('komentar.update',$komentar->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('isi') ? ' has-error' : '' }}">
			  			<label class="control-label">isi</label>	
			  			<input type="text" name="isi" class="form-control" value="{{ $komentar->isi }}"  required>
			  			@if ($errors->has('isi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('isi') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('tgl_komentar') ? ' has-error' : '' }}">
			  			<label class="control-label">tanggal komentar</label>	
			  			<input type="date" name="tgl_komentar" class="form-control" value="{{ $komentar->tgl_komentar }}"  required>
			  			@if ($errors->has('tgl_komentar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tgl_komentar') }}</strong>
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