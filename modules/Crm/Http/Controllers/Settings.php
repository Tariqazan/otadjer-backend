<?php

namespace Modules\Crm\Http\Controllers;

use App\Abstracts\Http\Controller;
use Modules\Crm\Models\DealPipeline;
use Modules\Crm\Jobs\CreateDealPipeline;
use Modules\Crm\Models\DealActivityType;
use Modules\Crm\Models\DealPipelineStage;
use Modules\Crm\Jobs\CreateDealActivityType;
use Modules\Crm\Jobs\CreateDealPipelineStage;
use Modules\Crm\Http\Requests\SettingRequest as Request;

class Settings extends Controller
{
    public function edit()
    {
        $activities = DealActivityType::orderBy('rank', 'asc')->get();

        $pipeline = DealPipeline::all();

        return view('crm::settings.edit', compact('activities', 'pipeline'));
    }

    public function getActivityType()
    {
        $html = view('crm::modals.setting.activity_type')->render();

        return response()->json([
            'success' => true,
            'error' => false,
            'data' => null,
            'message' => 'null',
            'html' => $html,
        ]);
    }

    public function createActivityType(Request $request)
    {
        $response = $this->ajaxDispatch(new CreateDealActivityType($request));

        if ($response['success']) {
            $response['redirect'] = route('crm.setting.edit');

            $message = trans('messages.success.added', ['type' => trans_choice('crm::setting.activity_type', 1)]);

            flash($message)->success();
        } else {
            $response['redirect'] = route('crm.setting.edit');

            $message = $response['message'];

            flash($message)->error()->important();
        }

        return response()->json($response);
    }

    public function editActivityType(DealActivityType $activity)
    {
        $html = view('crm::modals.setting.activity_type_edit', compact('activity'))->render();

        return response()->json([
            'success' => true,
            'error' => false,
            'data' => null,
            'html' => $html,
        ]);
    }

    public function updateActivityType(DealActivityType $activity, Request $request)
    {
        $request['company_id'] = company_id();
        $request['created_by'] = user()->id;

        $activity->update($request->input());

        $response = [
            'success' => true,
            'error' => false,
            'redirect' => route('crm.setting.edit'),
            'data' => null,
        ];

        return response()->json($response);
    }

    public function destroyActivityType(DealActivityType $activity)
    {
        $activity->delete();

        $response = [
            'success' => true,
            'error' => false,
            'redirect' => route('crm.setting.edit'),
            'data' => null,
            'message' => trans('messages.success.deleted', ['type' => $activity->name]),
            'html' => null,
        ];

        return response()->json($response);
    }

    public function getPipeline(DealPipeline $pipeline)
    {
        $life_stage = [
            'customer' => trans('crm::general.stage.customer'),
            'lead' => trans('crm::general.stage.lead'),
            'opportunity' => trans('crm::general.stage.opportunity'),
            'subscriber' => trans('crm::general.stage.subscriber'),
            'not_change' => trans('crm::general.stage.not_change')
        ];

        $html = view('crm::modals.setting.pipeline', compact('pipeline', 'life_stage'))->render();

        return response()->json([
            'success' => true,
            'error' => false,
            'data' => null,
            'message' => 'null',
            'html' => $html,
        ]);
    }

    public function createPipeline(Request $request)
    {
        $response = $this->ajaxDispatch(new CreateDealPipeline($request));

        if ($response['success']) {
            $response['redirect'] = route('crm.setting.edit');

            $response['message'] = trans('messages.success.added', ['type' => trans_choice('crm::setting.pipeline', 1)]);

            flash($response['message'])->success();
        } else {
            $response['redirect'] = route('crm.setting.edit');

            flash($response['message'])->error()->important();
        }

        return response()->json($response);
    }

    public function destroyPipeline(DealPipeline $pipeline)
    {
        $pipeline->delete();

        $response = [
            'success' => true,
            'error' => false,
            'message' => trans('messages.success.deleted', ['type' => $pipeline->name]),
            'redirect' => route('crm.setting.edit'),
            'data' => null,
            'html' => null,
        ];

        return response()->json($response);
    }

    public function getStage(DealPipeline $pipeline)
    {
        $life_stage = [
            'customer' => trans('crm::general.stage.customer'),
            'lead' => trans('crm::general.stage.lead'),
            'opportunity' => trans('crm::general.stage.opportunity'),
            'subscriber' => trans('crm::general.stage.subscriber'),
            'not_change' => trans('crm::general.stage.not_change')
        ];


        $html = view('crm::modals.setting.stage', compact('pipeline', 'life_stage'))->render();

        return response()->json([
            'success' => true,
            'error' => false,
            'data' => null,
            'message' => 'null',
            'html' => $html,
        ]);
    }

    public function createStage(Request $request)
    {
        $response = $this->ajaxDispatch(new CreateDealPipelineStage($request));

        if ($response['success']) {
            $response['redirect'] = route('crm.setting.edit');

            $response['message'] = trans('messages.success.added', ['type' => trans('crm::general.stage.title')]);

            flash($response['message'])->success();
        } else {
            $response['redirect'] = route('crm.setting.edit');

            flash($response['message'])->error()->important();
        }

        return response()->json($response);
    }

    public function editStage(DealPipelineStage $stage)
    {
        $life_stage = [
            'customer' => trans('crm::general.stage.customer'),
            'lead' => trans('crm::general.stage.lead'),
            'opportunity' => trans('crm::general.stage.opportunity'),
            'subscriber' => trans('crm::general.stage.subscriber'),
            'not_change' => trans('crm::general.stage.not_change')
        ];

        $pipeline = $stage->pipeline_id;

        $html = view('crm::modals.setting.stage_edit', compact('stage', 'life_stage', 'pipeline'))->render();

        return response()->json([
            'success' => true,
            'error' => false,
            'data' => null,
            'message' => 'null',
            'html' => $html,
        ]);
    }

    public function updateStage(DealPipelineStage $stage, Request $request)
    {
        $stage->update($request->input());

        $response = [
            'success' => true,
            'error' => false,
            'redirect' => route('crm.setting.edit'),
            'data' => null,
        ];

        return response()->json($response);
    }

    public function destroyStage(DealPipelineStage $stage)
    {
        $stage->delete();

        $response = [
            'success' => true,
            'error' => false,
            'redirect' => route('crm.setting.edit'),
            'data' => null,
            'message' => trans('messages.success.deleted', ['type' => $stage->name]),
            'html' => null,
        ];

        return response()->json($response);
    }

    public function activityRankUpdate(Request $request)
    {
        foreach ($request->activities as $rank => $activity) {
            DealActivityType::where('id', $activity['id'])->update(['rank' => $rank + 1]);
        }

        $response = [
            'success' => true,
            'errors' => false,
            'title' => '',
            'message' => '',
            'html' => null,
        ];

        if ($response['success']) {
            $response['message'] = trans('crm::general.activity_type_change');
        }

        return response()->json($response);
    }

    public function stageRankUpdate(Request $request)
    {
        foreach ($request->stages as $rank => $stage) {
            DealPipelineStage::where('id', $stage['id'])->update(['rank' => $rank + 1]);
        }

        $response = [
            'success' => true,
            'errors' => false,
            'title' => '',
            'message' => '',
            'html' => null,
        ];

        if ($response['success']) {
            $response['message'] = trans('crm::general.pipeline_stage_change');
        }

        return response()->json($response);
    }
}
