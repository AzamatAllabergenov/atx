@extends('layouts.backend')

@section('content')

<div class="content mt-3">
	<div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">{{ $item ? 'Редактировать' : 'Добавить' }}</strong>
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
					 	</div>
						@endforeach
					</div>
					@if($item && Upload::hasFile('gallery', $item->id))
					<div class="form-group">
                        <div class="row mx-1">
                        @foreach(Upload::getFiles('gallery', $item->id) as $key => $img)
                            <div class="position-relative img-thumbnail col-xs-4">
                                <img src="{{ asset($img) }}" alt="" style="height:150px">
                                <button type="button" 
                                    class="btn btn-danger position-absolute fixed-top js-file-delete"
                                    data-path="{{ $img }}"
                                >
                                    <i class="fa fa-trash"></i>
                                </button>
                            </div>
                        @endforeach
                        </div>
                        {!! Form::hidden('deleted_files', null, [
                            'class' => 'js-deleted-files'
                        ]) !!}
					</div>
					@endif
					<div class="form-group">
						<label for="files">Фото</label><br/>
						<input type="file" name="files[]" id="files" multiple>
					</div>
					
					<button type="submit" class="btn btn-primary">Сохранить</button>
					<a href="{{ action('Backend\GalleryController@index') }}" class="btn btn-outline-primary">
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
    jQuery(document).ready(function($) {
        
        var trash = [];
        $('.js-file-delete').on('click', function(e) {
            e.preventDefault();
            var _ = $(this);
            trash.push(_.data('path'));
            _.closest('.img-thumbnail').remove();

            $('.js-deleted-files').val(trash.join(','));
        })
    });
</script>
@endsection