<div id="widget-{{ $class->model->id }}" class="{{ $class->model->settings->width }}">
    <div class="card">
        <div class="card-header{{ !empty($header_class) ? ' ' . $header_class : '' }}">
            <div class="row align-items-center">
                <div class="col-12 text-nowrap">
                    <h4 class="mb-0 long-texts" title="{{ $class->model->name }}">{{ $class->model->name }}</h4>
                </div>
            </div>
        </div>
        <div class="card-body" id="widget-donut-{{ $class->model->id }}">
            <div class="chart-donut">
                {!! $chart->container() !!}
            </div>
        </div>
    </div>
</div>

@push('body_scripts')
    {!! $chart->script() !!}
@endpush
