@extends('layouts.backend')

@section('content')

<div class="content mt-3">
	<div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">{{ $item->name_ru }}</strong>
            </div>
            <div class="card-body">
                {!! Form::open(['files' => true, 'class' => 'mb-3']) !!}
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                {!! Form::label('code', 'Цвет') !!}
                                <div id="cp3a" class="input-group colorpicker-component" data-color="#000000">
                                    {!! Form::text('code', null, [
                                        'class' => 'form-control'
                                    ]) !!}
                                    <span class="input-group-addon"><i></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="file">Фото</label><br/>
                                <input type="file" name="file" id="file">
                            </div>
                        </div>
                    </div>
                        
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                    <a href="{{ action('Backend\CarController@index') }}" class="btn btn-outline-primary">
                        <i class="fa fa-arrow-left"></i> Назад
                    </a>
				{!! Form::close() !!}
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
                            <th scope="col">Фото</th>
							<th scope="col">Цвет</th>
							<th scope="col">Дата</th>
							<th scope="col" width="60"></th>
						</tr>
					</thead>
					<tbody>
						@forelse($item->colors as $i)
						<tr>
							<th scope="row">{{ $i->id }}</th>
							<th>
                                @if($i && Upload::hasFile('car-color', $i->id))
									<img src="{{ Upload::getThumbFile('car-color', $i->id, '200x200') }}" alt="" class="img-thumbnail" width="100">
								@else
									<div class="img-thumbnail" style="width: 100px; height: 100px"></div>
								@endif
                            </th>
							<td>
                                <label for="" class="p-2" style="
                                    background-color:{{ $i->code }};
                                    text-shadow:
                                        1px 1px 0 #fff,
                                        -1px -1px 0 #fff,  
                                        1px -1px 0 #fff,
                                        -1px 1px 0 #fff,
                                        1px 1px 0 #fff;
                                ">{{ $i->code }}</label>
                            </td>
							<td>{{ $i->created_at }}</td>
							<td class="text-center">
								<a href="#" data-href="{{ action('Backend\CarController@deleteColor', $i->id) }}" class="btn btn-danger js-delete-btn" data-toggle="modal" data-target="#deleteModal">
								  <i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="5" class="text-center">
								
							</td>
						</tr>
						@endforelse
					</tbody>
				</table>
      		</div>
		</div>
    </div>
</div><!-- .content -->

@endsection

@section('scripts')

@include('partials.backend-delete')
<script src="{{ asset('backend/js/bootstrap-colorpicker.min.js') }}"></script>

<script>
    jQuery(document).ready(function($) {
        $('#cp3a').colorpicker();
    });
</script>

@stop

@section('styles')

<link rel="stylesheet" href="{{ asset('backend/css/bootstrap-colorpicker.min.css') }}">

@endsection