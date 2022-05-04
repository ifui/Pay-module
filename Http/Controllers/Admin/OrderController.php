<?php

namespace Modules\Pay\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Pay\Entities\PayOrder;
use Modules\Pay\Http\Requests\Admin\OrderRequest;
use Modules\Pay\QueryBuilder\Models\PayOrderQuery;
use Spatie\QueryBuilder\QueryBuilder;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function index(): JsonResponse
    {
        $this->authorize(PayOrder::class);
        $model = QueryBuilder::for(PayOrder::class)
            ->allowedFilters(PayOrderQuery::filter())
            ->allowedIncludes(PayOrderQuery::include())
            ->defaultSort('-id')
            ->allowedSorts(PayOrderQuery::sort())
            ->paginate(request()->input('pageSize', 15));

        return result($model);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function show(int $id): JsonResponse
    {
        $this->authorize(PayOrder::class);

        $model = PayOrder::with(['pay_orderable', 'fapiao'])
            ->findOrFail($id);

        return result($model);
    }

    /**
     * Update the specified resource in storage.
     * @param OrderRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(OrderRequest $request, int $id): JsonResponse
    {
        $this->authorize(PayOrder::class);

        $model = PayOrder::findOrFail($id);

        $model->fill($request->validated());

        return resultStatus($model->save());
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function destroy(int $id): JsonResponse
    {
        $this->authorize(PayOrder::class);

        $model = PayOrder::findOrFail($id);

        return resultStatus($model->delete());
    }
}
