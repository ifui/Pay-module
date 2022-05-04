<?php

namespace Modules\Pay\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Modules\Pay\Entities\PayFapiao;
use Modules\Pay\Http\Requests\Admin\FapiaoRequest;
use Modules\Pay\QueryBuilder\Models\PayFapiaoQuery;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Spatie\QueryBuilder\QueryBuilder;

class FapiaoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return JsonResponse
     * @throws AuthorizationException
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(): JsonResponse
    {
        $this->authorize(PayFapiao::class);

        $model = QueryBuilder::for(PayFapiao::class)
            ->allowedFilters(PayFapiaoQuery::filter())
            ->allowedIncludes(PayFapiaoQuery::include())
            ->defaultSort('-id')
            ->allowedSorts(PayFapiaoQuery::sort())
            ->paginate(request()->input('pageSize', 15));

        return result($model);
    }

    /**
     * Store a newly created resource in storage.
     * @param FapiaoRequest $request
     * @return void
     */
    public function store(FapiaoRequest $request): void
    {
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function show(int $id): JsonResponse
    {
        $this->authorize(PayFapiao::class);

        $model = PayFapiao::with('pay_order')
            ->findOrFail($id);

        return result($model);
    }

    /**
     * Update the specified resource in storage.
     * @param FapiaoRequest $request
     * @param int $id
     * @return JsonResponse
     * @throws AuthorizationException
     */
    public function update(FapiaoRequest $request, int $id): JsonResponse
    {
        $this->authorize(PayFapiao::class);

        $model = PayFapiao::findOrFail($id);

        $model->fill($request->validated());
        $model->file = $request->input('file', null);

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
        $this->authorize(PayFapiao::class);

        $model = PayFapiao::findOrFail($id);

        return resultStatus($model->delete());
    }
}
