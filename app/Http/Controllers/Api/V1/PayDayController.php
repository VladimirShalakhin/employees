<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePayDayRequest;
use App\Http\Requests\UpdatePayDayRequest;
use App\Models\PayDay;

class PayDayController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePayDayRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(PayDay $payDay)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PayDay $payDay)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePayDayRequest $request, PayDay $payDay)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PayDay $payDay)
    {
        //
    }
}
