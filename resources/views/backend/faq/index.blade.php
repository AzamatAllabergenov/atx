@extends('layouts.backend')

@section('content')

<div class="content mt-3">
	<div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">FAQ</strong>
            </div>
            <div class="card-body">
            	<a href="{{ action('Backend\FaqController@form') }}" class="btn btn-success mb-3 float-right">
            		<i class="fa fa-plus"></i> Добавить
            	</a>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Вопрос</th>
							<th scope="col">Ответ</th>
							<th scope="col">Дата</th>
							<th scope="col" width="120"></th>
						</tr>
					</thead>
					<tbody>
						@forelse($items as $item)
						<tr>
							<th scope="row">{{ $item->id }}</th>
							<td>{{ $item->question_ru }}</td>
							<td>{!! $item->answer_ru !!}</td>
							<td>{{ $item->created_at }}</td>
							<td>
								<a href="{{ action('Backend\FaqController@form', $item->id) }}" class="btn btn-primary">
									<i class="fa fa-pencil"></i>
								</a>
								<a href="#" data-href="{{ action('Backend\FaqController@delete', $item->id) }}" class="btn btn-danger js-delete-btn" data-toggle="modal" data-target="#deleteModal">
								  <i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="6" class="text-center">
								
							</td>
						</tr>
						@endforelse
					</tbody>
				</table>
				<nav>
				    <ul class="pagination justify-content-end">
				         {{ $items->links('vendor.pagination.bootstrap-4') }}
				     </ul>
				</nav>
      		</div>
		</div>
    </div>
</div><!-- .content -->

@endsection

@section('scripts')

@include('partials.backend-delete')

@stop