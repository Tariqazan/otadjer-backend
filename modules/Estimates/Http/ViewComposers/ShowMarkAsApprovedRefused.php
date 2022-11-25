<?php

namespace Modules\Estimates\Http\ViewComposers;

use Illuminate\View\View;

class ShowMarkAsApprovedRefused
{

    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $document = $view->getData()['estimate'];

        $view->getFactory()->startPush(
            'timeline_get_paid_start',
            view('estimates::fields.show_mark_as_approved_refused', compact('document'))
        );
    }

}
