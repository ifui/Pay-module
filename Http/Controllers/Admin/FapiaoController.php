<?php

namespace Modules\Pay\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\MeetingKjj\Entities\MeetingRegister;
use Modules\MeetingKjj\Http\Requests\V1\Pay\FapiaoRequest;
use Modules\MeetingKjj\QueryBuilder\Models\MeetingRegisterQuery;
use Modules\Pay\Entities\PayFapiao;

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
