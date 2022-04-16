<?php

namespace Modules\Pay\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Pay\Entities\PayFapiao;
use Modules\Pay\Entities\PayOrder;
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
        $order = PayOrder::findOrFail($request->pay_order_id);

        // 权限验证，判断是否是本人
        $this->authorize('isOwner', $order);

        $fapiao = new PayFapiao();
        $fapiao->fill($request->validated());

        return resultStatus($fapiao->save());
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $model = PayFapiao::with('pay_order')
            ->findOrFail($id);

        // 权限验证，判断是否是本人
        $this->authorize('isOwner', $model->pay_order);

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

        // 权限验证，判断是否是本人
        $this->authorize('isOwner', $model->pay_order);

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
