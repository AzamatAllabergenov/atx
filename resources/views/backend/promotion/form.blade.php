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
								{!! Form::label('title_'.$lang, 'Название ('.$lang.')') !!}
								{!! Form::text('title_'.$lang, $item ? $item->{'title_'.$lang} : null, [
									'class' => 'form-control'
								]) !!}
							</div>
							<div class="form-group">
								{!! Form::label('short_text_'.$lang, 'Короткое описание ('.$lang.')') !!}
								{!! Form::text('short_text_'.$lang, $item ? $item->{'short_text_'.$lang} : null, [
									'class' => 'form-control'
								]) !!}
							</div>
							<div class="form-group">
								{!! Form::label('text_'.$lang, 'Текст ('.$lang.')') !!}
								{!! Form::textarea('text_'.$lang, $item ? $item->{'text_'.$lang} : null, [
									'class' => 'form-control redactor'
								]) !!}
							</div>
					 	</div>
						@endforeach
					</div>
					<div class="form-group">
						{!! Form::label('expiration_date', 'Дата окончания (dd-mm-YYYY)') !!}
						<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
							{!! Form::text('expiration_date', $item ? $item->expiration_date->format('d-m-Y') : null, [
								'class' => 'form-control js-datepicker'
							]) !!}
						</div>
					</div>
					@if($item && Upload::hasFile('news', $item->id))
					<div class="form-group">
						<img src="{{ Upload::getThumbFile('news', $item->id, '200x200') }}" alt="" class="img-thumbnail">
					</div>
					@endif
					<div class="form-group">
						<label for="file">Фото</label><br/>
						<input type="file" name="file" id="file">
					</div>
					
					<button type="submit" class="btn btn-primary">Сохранить</button>
					<a href="{{ action('Backend\PromotionController@index') }}" class="btn btn-outline-primary">
	            		<i class="fa fa-arrow-left"></i> Назад
	            	</a>
				{!! Form::close() !!}
      		</div>
		</div>
    </div>
</div><!-- .content -->
@endsection

@section('scripts')
<script src="{{ asset('backend/js/bootstrap-datepicker.min.js') }}"></script>

<script>
	initRedactor();
	jQuery(document).ready(function($) {
		$('.js-datepicker').datepicker({
			format: 'dd-mm-yyyy',
		});
	})
</script>
@endsection

@section('styles')

<link rel="stylesheet" href="{{ asset('backend/css/bootstrap-datepicker.min.css') }}">

@endsection