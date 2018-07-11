@extends('layouts.admin')
@section('content')
<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-info">
			  <div class="panel-heading">
			  	<div class="panel-title pull-right"><a href="{{ route('komentar.index') }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('komentar.store') }}" method="post" >
			  		{{ csrf_field() }}

			  		<div class="form-group {{ $errors->has('isi') ? ' has-error' : '' }}">
			  			<label class="control-label">Isi Komentar</label>	
			  			<input type="text" name="isi" class="form-control"  required>
			  			@if ($errors->has('isi'))
                            <span class="help-block">
                                <strong>{{ $errors->first('isi') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('tgl_komentar') ? ' has-error' : '' }}">
			  			<label class="control-label">Tanggal komentar</label>	
			  			<input type="date" name="tgl_komentar" class="form-control"  required>
			  			@if ($errors->has('tgl_komentar'))
                            <span class="help-block">
                                <strong>{{ $errors->first('tgl_komentar') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('artikel_id') ? ' has-error' : '' }}">
			  			<label class="control-label">Artikel</label>	
			  			<select name="artikel_id" class="form-control">
			  				@foreach($artikel as $data)
			  				<option value="{{ $data->id }}">{{ $data->judul }}</option>
			  				@endforeach
			  			</select>
			  			@if ($errors->has('artikel_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('artikel_id') }}</strong>
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