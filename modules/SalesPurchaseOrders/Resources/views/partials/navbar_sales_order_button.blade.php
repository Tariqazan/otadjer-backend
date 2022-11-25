@can('create-sales-purchase-orders-sales-orders')
    <a href="{{ route('sales-purchase-orders.sales-orders.create') }}" class="col-4 shortcut-item">
        <span class="shortcut-media avatar rounded-circle bg-gradient-info">
        <i class="fas fa-file-invoice-dollar"></i>
        </span>
        <small class="text-info">{{ trans_choice('sales-purchase-orders::general.sales_orders', 1) }}</small>
    </a>
@endcan
