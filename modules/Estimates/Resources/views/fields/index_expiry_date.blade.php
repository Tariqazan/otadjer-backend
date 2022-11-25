@stack('expire_at_td_start')
<td class="col-lg-2 col-xl-2 d-none d-lg-block text-left">
    @stack('expire_at_td_inside_start')

    @if (null !== $expire_at)
        @date($expire_at)
    @endif

    @stack('expire_at_td_inside_end')
</td>
@stack('expire_at_td_end')
