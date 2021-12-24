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
								{!! Form::label('name_'.$lang, 'Название ('.$lang.')') !!}
								{!! Form::text('name_'.$lang, $item ? $item->{'name_'.$lang} : null, [
									'class' => 'form-control'
								]) !!}
							</div>
							<div class="form-group">
								{!! Form::label('interior_'.$lang, 'Интерьер ('.$lang.')') !!}
								{!! Form::textarea('interior_'.$lang, $item ? $item->{'interior_'.$lang} : null, [
									'class' => 'form-control redactor'
								]) !!}
							</div>
                            <div class="form-group">
								{!! Form::label('exterior_'.$lang, 'Экстерьер ('.$lang.')') !!}
								{!! Form::textarea('exterior_'.$lang, $item ? $item->{'exterior_'.$lang} : null, [
									'class' => 'form-control redactor'
								]) !!}
							</div>
					 	</div>
						@endforeach
                        
                        @if($item && Upload::hasFile('interior', $item->id))
                        <div class="form-group">
                            <div class="row mx-1">
                            @foreach(Upload::getFiles('interior', $item->id) as $key => $img)
                                <div class="position-relative img-thumbnail col-xs-4">
                                    <img src="{{ asset($img) }}" alt="" style="height:150px">
                                    <button type="button" 
                                        class="btn btn-danger position-absolute fixed-top js-interior-file-delete"
                                        data-path="{{ $img }}"
                                    >
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            @endforeach
                            </div>
                            {!! Form::hidden('deleted_interior_files', null, [
                                'class' => 'js-interior-deleted-files'
                            ]) !!}
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="files">Изображения интерьера</label><br/>
                            <input type="file" name="interior_files[]" id="files" multiple>
                        </div>

                        @if($item && Upload::hasFile('exterior', $item->id))
                        <div class="form-group">
                            <div class="row mx-1">
                            @foreach(Upload::getFiles('exterior', $item->id) as $key => $img)
                                <div class="position-relative img-thumbnail col-xs-4">
                                    <img src="{{ asset($img) }}" alt="" style="height:150px">
                                    <button type="button" 
                                        class="btn btn-danger position-absolute fixed-top js-exterior-file-delete"
                                        data-path="{{ $img }}"
                                    >
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </div>
                            @endforeach
                            </div>
                            {!! Form::hidden('deleted_exterior_files', null, [
                                'class' => 'js-exterior-deleted-files'
                            ]) !!}
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="files">Изображения экстерьера</label><br/>
                            <input type="file" name="exterior_files[]" id="files" multiple>
                        </div>

                        <div class="form-group">
                            {!! Form::label('transmission', 'Трансмиссия') !!}
                            {!! Form::text('transmission', $item ? $item->transmission : null, [
                                'class' => 'form-control'
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('fuel_consumption', 'Расход топлива') !!}
                            {!! Form::text('fuel_consumption', $item ? $item->fuel_consumption : null, [
                                'class' => 'form-control'
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('cargo_space', 'Объем багажника') !!}
                            {!! Form::text('cargo_space', $item ? $item->cargo_space : null, [
                                'class' => 'form-control'
                            ]) !!}
                        </div>
                         <div class="form-group">
                            {!! Form::label('video', 'Video URL') !!}
                            {!! Form::text('video', $item ? $item->video : null, [
                                'class' => 'form-control'
                            ]) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('abs', 'ABS') !!}<br/>
                            {!! Form::radio('abs', 0, $item && $item->abs == 0) !!} Нет &nbsp;
                            {!! Form::radio('abs', 1, $item && $item->abs == 1) !!} Да
                        </div>
                        @if($item && Upload::hasFile('car', $item->id))
                        <div class="form-group">
                        <img src="{{ Upload::getThumbFile('car', $item->id, '240x120') }}" alt="" class="img-thumbnail">
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="file">Фото</label><br/>
                            <input type="file" name="file" id="file">
                        </div>
                        <div class="form-group">
                            <label for="options" class="font-weight-bold">Доступные опции</label><br/>
                            @foreach($options as $option)
                            <label for="opt-{{ $option->id}}">
                                {!! Form::checkbox('options[]', $option->id, ($item && in_array($option->id, $item->options->pluck('id')->toArray())), [
                                    'id' => 'opt-'.$option->id
                                ]) !!} {{ $option->name_ru }}
                            </label>
                            @endforeach
                        </div>
					</div>
					
					<button type="submit" class="btn btn-primary">Сохранить</button>
					<a href="{{ action('Backend\CarController@index') }}" class="btn btn-outline-primary">
	            		<i class="fa fa-arrow-left"></i> Назад
	            	</a>
				{!! Form::close() !!}
      		</div>
		</div>
    </div>
</div><!-- .content -->
@endsection

@section('scripts')

<script>
    initRedactor();
    jQuery(document).ready(function($) {
        
        function initDelete(prefix) {
            var trash = [];
            $('.js-' + prefix + '-file-delete').on('click', function(e) {
                e.preventDefault();
                var _ = $(this);
                trash.push(_.data('path'));
                _.closest('.img-thumbnail').remove();

                $('.js-' + prefix + '-deleted-files').val(trash.join(','));
            })
        }
        
        initDelete('interior');
        initDelete('exterior');
    });
</script>
@endsection