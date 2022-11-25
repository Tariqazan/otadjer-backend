@stack('expire_at_th_start')
<th class="col-lg-2 col-xl-2 d-none d-lg-block text-left">
    @stack('expire_at_th_inside_start')

    @sortablelink('expire_at', trans('estimates::general.expiry_date'))

    @stack('expire_at_th_inside_end')
</th>
@stack('expire_at_th_end')
