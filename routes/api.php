<?php

use App\Http\Controllers\Api\SubmissionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => '\App\Http\Controllers\Api', 'prefix'=> 'v1'], function () {
    Route::post('submission', [SubmissionController::class, 'queueSubmission'])->name('queue-submission');
});
