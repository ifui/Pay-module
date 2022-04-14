<?php

namespace Modules\Pay\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Pay\Entities\PayFapiao;
use Modules\Pay\Http\Requests\V1\FapiaoRequest;

class FapiaoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param FapiaoRequest $request
     * @return Response
     */
    public function store(FapiaoRequest $request)
    {
        try {
            $className = config('pay.fapiao_accept_types.' . $request->type);
            $model = new $className();
            $model = $model->findOrFail($request->type_id);
        } catch (\Exception $e) {
            return error('pay::code.7003');
        }

        // 权限验证，判断是否有权限申请发票
        $this->authorize('isPayFapiao', $model);

        $fapiao = new PayFapiao();
        $fapiao->fill($request->validated());
        $fapiao->pay_fapiaoable_id = $request->type_id;
        $fapiao->pay_fapiaoable_type = $className;

        return resultStatus($fapiao->save());
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $model = PayFapiao::with('pay_fapiaoable')
            ->findOrFail($id);

        return result($model);
    }

    /**
     * Update the specified resource in storage.
     * @param FapiaoRequest $request
     * @param int $id
     * @return Response
     */
    public function update(FapiaoRequest $request, $id)
    {
        $model = PayFapiao::findOrFail($id);

        // 权限判断，是否是本人
        $this->authorize('isOwner', $model->pay_fapiaoable);

        $model->fill($request->validated());

        return resultStatus($model->save());
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
