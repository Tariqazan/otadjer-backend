<a href="{{ route('notifications.index') . '#inventory-items' }}" class="list-group-item list-group-item-action">
    <div class="row align-items-center">
        <div class="col-auto">
            <i class="fa fa-cube"></i>
        </div>

        <div class="col ml--2">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0 text-sm">{{ trans('inventory::general.notifications.reorder_level', ['count' => count($item_notifications)]) }}</h4>
            </div>
        </div>
    </div>
</a>
