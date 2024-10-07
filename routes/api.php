<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BiomarkerController;

Route::middleware('api.key')->group(function () {
    Route::apiResource('biomarkers', BiomarkerController::class);
});
