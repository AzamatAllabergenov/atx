@extends('layouts.backend')

@section('content')

<div class="content mt-3">
	<div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">{{ $item ? 'Редактировать' : 'Добавить' }}</strong>
            </div>
            <div class="card-body">

				{!! Form::open(['files' => true]) !!}
					<div class="tab-content pt-3" id="myTabContent">
						
					<div class="form-group">
						{!! Form::label('name', 'Иия') !!}
						{!! Form::text('name', $item ? $item->name : null, [
							'class' => 'form-control'
						]) !!}
					</div>
					<div class="form-group">
						{!! Form::label('email', 'E-mail') !!}
						{!! Form::text('email', $item ? $item->email : null, [
							'class' => 'form-control'
						]) !!}
					</div>
					<div class="form-group">
						{!! Form::label('password', 'Пароль') !!}
						{!! Form::password('password', [
							'class' => 'form-control'
						]) !!}
					</div>
					 	
					<button type="submit" class="btn btn-primary">Сохранить</button>
					<a href="{{ action('Backend\UserController@index') }}" class="btn btn-outline-primary">
	            		<i class="fa fa-arrow-left"></i> Назад
	            	</a>
				{!! Form::close() !!}
      		</div>
		</div>
    </div>
</div><!-- .content -->
@endsection