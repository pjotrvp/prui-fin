<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Investment::all();
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
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'symbol' => 'required',
            'category' => 'required',
            'amount' => 'required|numeric',
            'initial_value' => 'required|numeric',
            'start_date' => 'required|date',
        ]);

        return Investment::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Investment::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $investment = Investment::findOrFail($id);
        $investment->update($request->all());
        return $investment;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Investment::destroy($id);
        return response()->noContent();
    }

    public function fetchStockValue($symbol)
{
    $apiKey = env('ALPHA_VANTAGE_API_KEY');
    $url = "https://www.alphavantage.co/query?function=GLOBAL_QUOTE&symbol={$symbol}&apikey={$apiKey}";
    $response = Http::get($url);

    if ($response->successful()) {
        return $response['Global Quote']['05. price'] ?? null;
    }

    return response()->json(['error' => 'Unable to fetch stock data'], 400);
}
}
