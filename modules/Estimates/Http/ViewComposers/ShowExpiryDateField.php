<?php

namespace Modules\Estimates\Http\ViewComposers;

use Illuminate\View\View;

class ShowExpiryDateField
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
        $data = $view->getData();

        if (isset($data['estimate'])) {
            $document = $data['estimate'];
        } elseif (isset($data['document'])) {
            $document = $data['document'];
        }

        if (false === isset($document)) {
            return;
        }

        $expire_at = $document->extra_param->expire_at;

        $view->getFactory()->startPush(
            'issued_at_input_end',
            view('estimates::fields.show_expiry_date', compact('expire_at'))
        );
    }

}
