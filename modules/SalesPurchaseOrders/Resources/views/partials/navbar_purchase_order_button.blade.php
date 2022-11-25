@can('create-sales-purchase-orders-purchase-orders')
    <a href="{{ route('sales-purchase-orders.purchase-orders.create') }}" class="col-4 shortcut-item">
        <span class="shortcut-media avatar rounded-circle bg-gradient-danger">
        <i class="fas fa-file-invoice-dollar"></i>
        </span>
        <small class="text-danger">{{ trans_choice('sales-purchase-orders::general.purchase_orders', 1) }}</small>
    </a>
@endcan
