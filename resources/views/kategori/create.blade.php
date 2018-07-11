@extends('layouts.admin')
@section('content')

<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-info">
			  <div class="panel-heading">
			  	<div class="panel-title pull-right"><a href="{{ route('kategori.index') }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('kategori.store') }}" method="post" >
			  		{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('news') ? ' has-error' : '' }}">
			  			<label class="control-label">News</label>	
			  			<input type="text" name="news" class="form-control"  required>
			  			@if ($errors->has('news'))
                            <span class="help-block">
                                <strong>{{ $errors->first('news') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('populer') ? ' has-error' : '' }}">
			  			<label class="control-label">Populer</label>	
			  			<input type="text" name="populer" class="form-control"  required>
			  			@if ($errors->has('populer'))
                            <span class="help-block">
                                <strong>{{ $errors->first('populer') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('fashion') ? ' has-error' : '' }}">
			  			<label class="control-label">Fashion</label>	
			  			<input type="text" name="fashion" class="form-control"  required>
			  			@if ($errors->has('fashion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fashion') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('kpop') ? ' has-error' : '' }}">
			  			<label class="control-label">kpop</label>	
			  			<input type="text" name="kpop" class="form-control"  required>
			  			@if ($errors->has('kpop'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kpop') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('infotainment') ? ' has-error' : '' }}">
			  			<label class="control-label">infotainment</label>	
			  			<input type="text" name="infotainment" class="form-control"  required>
			  			@if ($errors->has('infotainment'))
                            <span class="help-block">
                                <strong>{{ $errors->first('infotainment') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('food') ? ' has-error' : '' }}">
			  			<label class="control-label">Food</label>	
			  			<input type="text" name="food" class="form-control"  required>
			  			@if ($errors->has('food'))
                            <span class="help-block">
                                <strong>{{ $errors->first('food') }}</strong>
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