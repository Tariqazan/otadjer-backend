<div id="widget-{{ $class->model->id }}" class="{{ $class->model->settings->width }}">
	<div class="card bg-gradient-info border-0">
		<div class="card-body">
			<div class="row">
				<div class="col-xl-8 col-lg-8 col-md-6 col-sm-10 col-xs-10">
					<h5 class="card-title text-uppercase text-muted mb-1 text-white long-texts">{{ trans('inventory::widgets.total_income') }}</h5>
                    <span class="font-weight-bold mb-0 text-white">
                        @money($total_income, setting('default.currency'), true)
                    </span>
                </div>
				<div class="col-xl-4 col-lg-4 col-md-6 col-sm-2 col-xs-2">
					<div class="icon icon-shape bg-white text-info rounded-circle shadow">
						<i class="fa fa-money-bill"></i>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
