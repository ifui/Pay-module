<?php

namespace Modules\Pay\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\MeetingKjj\Http\Requests\V1\Pay\FapiaoRequest;
use Modules\Pay\Entities\PayFapiao;
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
            ->defaultSort('sort')
            ->allowedSorts(PayFapiaoQuery::sort())
            ->paginate(request()->get('pageSize'));

        return result($model);
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Response
     */
    public function store(FapiaoRequest $request, $id)
    {
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(FapiaoRequest $request, $id)
    {
        //
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
