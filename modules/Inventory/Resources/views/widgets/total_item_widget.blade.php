<div id="widget-{{ $class->model->id }}" class="{{ $class->model->settings->width }}">
	<div class="card bg-gradient-{{ $color }} card-stats">
		@include($class->views['header'], ['header_class' => 'border-bottom-0'])
		<div class="card-body">
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-md-6 col-sm-10 col-xs-10">
					<h5 class="card-title text-uppercase text-muted mb-1 text-white long-texts">{{ $name }}</h5>
					<span class="font-weight-bold mb-0 text-white">{{ $stock }}</span>
				</div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-2 col-xs-2">
					<div class="icon icon-shape bg-white text-{{ $color }} rounded-circle shadow">
						<i class="fa fa-cubes"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
