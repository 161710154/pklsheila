@extends('layouts.admin')
@section('content')

<body style="background-color: thistle">

<div class="row">
	<div class="container">
		<div class="col-md-12">
			<div class="panel panel-inffo">
			  <div class="panel-heading">Edit Data Kategori
			  	<div class="panel-title pull-right"><a href="{{ route('kategori.index') }}">Kembali</a>
			  	</div>
			  </div>
			  <div class="panel-body">
			  	<form action="{{ route('kategori.update',$kategori->id) }}" method="post" >
			  		<input name="_method" type="hidden" value="PATCH">
        			{{ csrf_field() }}
			  		<div class="form-group {{ $errors->has('news') ? ' has-error' : '' }}">
			  			<label class="control-label">news</label>	
			  			<input type="text" name="news" class="form-control" value="{{ $kategori->news }}"  required>
			  			@if ($errors->has('news'))
                            <span class="help-block">
                                <strong>{{ $errors->first('news') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('populer') ? ' has-error' : '' }}">
			  			<label class="control-label">populer</label>	
			  			<input type="text" name="populer" class="form-control" value="{{ $kategori->populer }}"  required>
			  			@if ($errors->has('populer'))
                            <span class="help-block">
                                <strong>{{ $errors->first('populer') }}</strong>
                            </span>
                        @endif
			  		</div>

					<div class="form-group {{ $errors->has('fashion') ? ' has-error' : '' }}">
			  			<label class="control-label">fashion</label>	
			  			<input type="text" name="fashion" class="form-control" value="{{ $kategori->fashion }}"  required>
			  			@if ($errors->has('fashion'))
                            <span class="help-block">
                                <strong>{{ $errors->first('fashion') }}</strong>
                            </span>
                        @endif
			  		</div>
			  
			  		<div class="form-group {{ $errors->has('kpop') ? ' has-error' : '' }}">
			  			<label class="control-label">kpop</label>	
			  			<input type="text" name="kpop" class="form-control" value="{{ $kategori->kpop }}"  required>
			  			@if ($errors->has('kpop'))
                            <span class="help-block">
                                <strong>{{ $errors->first('kpop') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('infotainment') ? ' has-error' : '' }}">
			  			<label class="control-label">infotainment</label>	
			  			<input type="text" name="infotainment" class="form-control" value="{{ $kategori->infotainment }}"  required>
			  			@if ($errors->has('infotainment'))
                            <span class="help-block">
                                <strong>{{ $errors->first('infotainment') }}</strong>
                            </span>
                        @endif
			  		</div>

			  		<div class="form-group {{ $errors->has('food') ? ' has-error' : '' }}">
			  			<label class="control-label">food</label>	
			  			<input type="text" name="food" class="form-control" value="{{ $kategori->food }}"  required>
			  			@if ($errors->has('food'))
                            <span class="help-block">
                                <strong>{{ $errors->first('food') }}</strong>
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