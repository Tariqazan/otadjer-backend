<div id="widget-{{ $class->model->id }}" class="{{ $class->model->settings->width }}">
    <div class="card">
        <div class="card-header{{ !empty($header_class) ? ' ' . $header_class : '' }}">
            <div class="row align-items-center">
                <div class="col-12 text-nowrap">
                    <h4 class="mb-0 long-texts" title="{{ $class->model->name }}">{{ $class->model->name }}</h4>
                </div>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr class="row table-head-line">
                        <th class="col-xs-6 col-md-6 text-left">{{ trans_choice('inventory::general.warehouses', 1) }}</th>
                        <th class="col-xs-6 col-md-6 text-right">{{ trans('inventory::items.reorder_level') }}</th>
                    </tr>
                </thead>
                <tbody class="thead-light">
                    @foreach($items as $item)
                        <tr class="row border-top-1 tr-py">
                            <td class="col-xs-6 col-md-6 text-left long-texts">{{ $item->warehouse_name }}</td>
                            <td class="col-xs-6 col-md-6 text-right">{{ $item->reorder_level }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
