<?php

namespace Modules\Estimates\Http\ViewComposers;

use App\Utilities\Date;
use Illuminate\View\View;

class AddExpiryDateField
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
        $expire_at = null;
        if (isset($view->getData()['estimate'])) {
            $expire_at = $view->getData()['estimate']->extra_param->expire_at;
        }

        if (null === $expire_at) {
            $addDays = setting('estimates.estimate.approval_terms', 0) ?: 0;

            $expire_at = Date::parse()->addDays($addDays)->toDateString();
        }

        $view->getFactory()->startPush(
            'document_number_input_start',
            view('estimates::fields.add_expiry_date', compact('expire_at'))
        );
    }

}
