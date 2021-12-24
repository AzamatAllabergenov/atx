@extends('layouts.backend')

@section('content')

<div class="content mt-3">
	<div class="animated fadeIn">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Акции и спецпредложения</strong>
            </div>
            <div class="card-body">
            	<a href="{{ action('Backend\PromotionController@form') }}" class="btn btn-success mb-3 float-right">
            		<i class="fa fa-plus"></i> Добавить
            	</a>
				<table class="table">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Название</th>
							<th scope="col">Фото</th>
							<th scope="col">Короткое описание</th>
							<th scope="col">Дата окончания</th>
							<th scope="col">Дата создания</th>
							<th scope="col">Активный</th>
							<th scope="col" width="120"></th>
						</tr>
					</thead>
					<tbody>
						@forelse($items as $item)
						<tr>
							<th scope="row">{{ $item->id }}</th>
							<td>{{ $item->title_ru }}</td>
							<td>
								@if($item && Upload::hasFile('promotion', $item->id))
									<img src="{{ Upload::getThumbFile('promotion', $item->id, '200x200') }}" alt="" class="img-thumbnail" width="50">
								@else
									<div class="img-thumbnail" style="width: 50px; height: 50px"></div>
								@endif
							</td>
							<td>{{ $item->short_text_ru }}</td>
							<td>{{ $item->experation_date }}</td>
							<td>{{ $item->created_at }}</td>
							<td>
								<a href="#" data-href="{{ action('Backend\PromotionController@status', $item->id) }}" class="js-status-btn btn {{ $item->show ? 'btn-success' : 'btn-danger' }}">
									{{ $item->show ? 'Да' : 'Нет' }}
								</a>
							</td>
							<td>
								<a href="{{ action('Backend\PromotionController@form', $item->id) }}" class="btn btn-primary">
									<i class="fa fa-pencil"></i>
								</a>
								<a href="#" data-href="{{ action('Backend\PromotionController@delete', $item->id) }}" class="btn btn-danger js-delete-btn" data-toggle="modal" data-target="#deleteModal">
								  <i class="fa fa-trash"></i>
								</a>
							</td>
						</tr>
						@empty
						<tr>
							<td colspan="7" class="text-center">
								
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
<script>
	jQuery(document).ready(function($) {
		var loading = false;

		if (!loading) {
			$('.js-status-btn').on('click', function(e) {
				e.preventDefault();
				var _ = $(this);
				loading = true;
				_.prepend($('<i/>').addClass('fa fa-spinner fa-spin mr-1'))
				$.ajax({
					method: 'post',
					url: _.data('href'),
					data: {},
					success: function(data) {
						loading = false;
						if (data.show) {
							_.removeClass('btn-danger').addClass('btn-success').text('Да');
						} else {
							_.removeClass('btn-success').addClass('btn-danger').text('Нет');
						}
						console.log(data);
					}
				})
			});
		}
	});
</script>
@stop