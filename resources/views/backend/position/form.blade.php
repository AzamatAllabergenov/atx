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
				    	<a class="nav-link{{ $key == 0 ? ' active': '' }}" id="{{ $lang }}-tab" data-toggle="tab" href=".lang_{{ $lang }}" role="tab" aria-controls="lang_{{ $lang }}" aria-selected="true">{{ $lang }}</a>
				  	</li>
				  	@endforeach
				</ul>

				{!! Form::open(['files' => true]) !!}
					<div class="tab-content pt-3">
						<div class="form-group">
							{!! Form::label('cost', 'Цена') !!}
							{!! Form::text('cost', $item ? $item->cost : null, [
								'class' => 'form-control'
							]) !!}
						</div>
						@foreach(config('app.available_locales') as $key=>$lang)
					 	<div class="tab-pane fade lang_{{ $lang }}{{ $key == 0 ? ' show active': '' }}" role="tabpanel" aria-labelledby="{{ $lang }}-tab">
					 		<div class="form-group">
								{!! Form::label('name_'.$lang, 'Название ('.$lang.')') !!}
								{!! Form::text('name_'.$lang, $item ? $item->{'name_'.$lang} : null, [
									'class' => 'form-control'
								]) !!}
							</div>
							<table class="table table-hover">
								<thead>
									<tr>
										<th>Тех. характеристики</th>
										<th>Значение ({{ $lang }})</th>
									</tr>
								</thead>
								<tbody>
								@foreach($features as $group_id => $fs)
									<tr>
									<td colspan="2" class="">
										<strong>{{ $feature_groups[$group_id] }}</strong>
									</td>
									</tr>
									@foreach($fs as $feature)
									<tr>
										<td>{{ $feature->name_ru }}</td>
										<td>
											{!! Form::text('features['.$feature->id.'][value_'.$lang.']', 
											isset($fts[$feature->id]) ? $fts[$feature->id]['pivot']['value_'.$lang.''] : null,
											[
												'class' => 'form-control'
											]) !!}
										</td>
									@endforeach
								@endforeach
								</tbody>
							</table>

							
					 	</div>
						@endforeach
						<table class="table mt-5">
							<thead>
								<tr>
									<th>Опции</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
							@foreach($options as $option)
								<tr>
									<td>{{ $option->name_ru }}</td>
									<td>
										{!! Form::checkbox('options[]', $option->id, $item && $item->options->contains($option->id)) !!}
									</td>
								</tr>
							@endforeach
							</tbody>
						</table>
					</div>
					
					<button type="submit" class="btn btn-primary">Сохранить</button>
					<a href="{{ action('Backend\PositionController@index', $car_id) }}" class="btn btn-outline-primary">
	            		<i class="fa fa-arrow-left"></i> Назад
	            	</a>
				{!! Form::close() !!}
      		</div>
		</div>
    </div>
</div><!-- .content -->
@endsection
