@extends('layouts.backend')

@section('content')

<div class="content mt-3">
	<div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">{{ $item ? 'Редактировать' : 'Добавить' }} новости</strong>
            </div>
            <div class="card-body">

            	<ul class="nav nav-tabs" id="myTab" role="tablist">
            		@foreach(config('app.available_locales') as $key=>$lang)
				 	<li class="nav-item">
				    	<a class="nav-link{{ $key == 0 ? ' active': '' }}" id="{{ $lang }}-tab" data-toggle="tab" href="#lang_{{ $lang }}" role="tab" aria-controls="lang_{{ $lang }}" aria-selected="true">{{ $lang }}</a>
				  	</li>
				  	@endforeach
				</ul>

				{!! Form::open(['files' => true]) !!}
					<div class="tab-content pt-3" id="myTabContent">
						@foreach(config('app.available_locales') as $key=>$lang)
					 	<div class="tab-pane fade{{ $key == 0 ? ' show active': '' }}" id="lang_{{ $lang }}" role="tabpanel" aria-labelledby="{{ $lang }}-tab">
					 		<div class="form-group">
								{!! Form::label('url_'.$lang, 'URL ('.$lang.')') !!}
								{!! Form::text('url_'.$lang, $item ? $item->{'url_'.$lang} : null, [
									'class' => 'form-control'
								]) !!}
							</div>
							@if($item && Upload::hasFile('slider-'.$lang, $item->id))
							<div class="form-group">
								<img src="{{ Upload::getThumbFile('slider-'.$lang, $item->id, '1920x705') }}" width="200" height="200" alt="" class="img-thumbnail">
							</div>
							@endif
							<div class="form-group">
								<label for="file_{{ $lang }}">Фото (1200x420)</label><br/>
								<input type="file" name="file_{{ $lang }}" id="file_{{ $lang }}">
							</div>
					 	</div>
						@endforeach
					</div>
					
					<button type="submit" class="btn btn-primary">Сохранить</button>
					<a href="{{ action('Backend\SliderController@index') }}" class="btn btn-outline-primary">
	            		<i class="fa fa-arrow-left"></i> Назад
	            	</a>
				{!! Form::close() !!}
      		</div>
		</div>
    </div>
</div><!-- .content -->
@endsection