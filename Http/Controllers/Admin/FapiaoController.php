<?php

namespace Modules\Pay\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Pay\Entities\PayFapiao;
use Modules\Pay\Http\Requests\Admin\FapiaoRequest;
use Modules\Pay\QueryBuilder\Models\PayFapiaoQuery;
use Spatie\QueryBuilder\QueryBuilder;

class FapiaoController extends Controller
{
    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $this->authorize(PayFapiao::class);

        $model = QueryBuilder::for(PayFapiao::class)
            ->allowedFilters(PayFapiaoQuery::filter())
            ->allowedIncludes(PayFapiaoQuery::include())
            ->defaultSort('-id')
            ->allowedSorts(PayFapiaoQuery::sort())
            ->paginate(request()->get('pageSize'));

        return result($model);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(FapiaoRequest $request)
    {
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $this->authorize(PayFapiao::class);

        $model = PayFapiao::with('pay_order')
            ->findOrFail($id);

        return result($model);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(FapiaoRequest $request, $id)
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
     * @return Response
     */
    public function destroy($id)
    {
        $this->authorize(PayFapiao::class);

        $model = PayFapiao::findOrFail($id);

        return resultStatus($model->delete());
    }
}
