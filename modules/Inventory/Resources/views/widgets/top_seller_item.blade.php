<div id="widget-{{ $class->model->id }}" class="{{ $class->model->settings->width }}">
    <div class="card">
        @include($class->views['header'])

        <div class="table-responsive">
            <table class="table align-items-center table-flush">
                <thead class="thead-light">
                    <tr class="row table-head-line">
                        <th class="col-xs-6 col-md-6 text-left">{{ trans('general.name') }}</th>
                        <th class="col-xs-6 col-md-6 text-right">{{ $title }}</th>
                    </tr>
                </thead>
                <tbody class="thead-light">
                    @foreach($items as $item)
                        <tr class="row border-top-1 tr-py">
                            <td class="col-xs-6 col-md-6 text-left long-texts">{{ $item->name }}</td>
                            <td class="col-xs-6 col-md-6 text-right">@money($item->value, setting('default.currency'), true)</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
