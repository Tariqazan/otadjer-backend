<?php

namespace Modules\Estimates\Http\ViewComposers;

use App\Traits\DateTime;
use Illuminate\Support\Facades\URL;
use Illuminate\View\View;

class ShowSentTimeline
{

    use DateTime;

    /**
     * Bind data to the view.
     *
     * @param View $view
     *
     * @return void
     */
    public function compose(View $view)
    {
        $date_format = $this->getCompanyDateFormat();
        $document    = $view->getData()['estimate'];

        $signedUrl = URL::signedRoute('signed.estimates.estimates.show', [$document->id, 'company_id' => company_id()]);

        $view->getFactory()->startPush(
            'timeline_sent_start',
            view('estimates::fields.show_sent_timeline', compact('date_format', 'document', 'signedUrl'))
        );
    }

}
