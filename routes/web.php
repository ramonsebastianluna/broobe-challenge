<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RunMetricController;
use App\Http\Controllers\MetricHistoryController;

Route::get('/', [RunMetricController::class, 'index'])->name('run-metric.index');
Route::get('/metric-history', [MetricHistoryController::class, 'index'])->name('metric-history.index');