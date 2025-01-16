<?php

use App\Http\Controllers\InvestmentController;

Route::apiResource('investments', InvestmentController);

Route::get('stock/{symbol}', [InvestmentController::class, 'fetchStockValue']);
