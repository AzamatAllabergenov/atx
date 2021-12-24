@extends('layouts.backend')

@section('content')

<div class="content mt-3">
	<div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Автосервис</strong>
            </div>
            <div class="card-body">
            	<a href="{{ action('Backend\AutoserviceController@form') }}" class="btn btn-success mb-3 float-right">
            		<i class="fa fa-plus"></i> Добавить
            	</a>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Название</th>
							<th scope="col">Фото</th>
							<th scope="col">Дата</th>
							<th scope="col" width="120"></th>
						</tr>
					</thead>
					<tbody>
						@forelse($items as $item)
						<tr>
							<th scope="row">{{ $item->id }}</th>
							<td>{{ $item->title_ru }}</td>
							<td>
								@if($item && Upload::hasFile('autoservice', $item->id))
									<img src="{{ Upload::getThumbFile('autoservice', $item->id, '200x200') }}" alt="" class="img-thumbnail" width="50">
								@else
									<div class="img-thumbnail" style="width: 50px; height: 50px"></div>
								@endif
							</td>
							<td>{{ $item->created_at }}</td>
							<td>
								<a href="{{ action('Backend\AutoserviceController@form', $item->id) }}" class="btn btn-primary">
									<i class="fa fa-pencil"></i>
								</a>
								<a href="#" data-href="{{ action('Backend\AutoserviceController@delete', $item->id) }}" class="btn btn-danger js-delete-btn" data-toggle="modal" data-target="#deleteModal">
								  <i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="4" class="text-center">
								
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