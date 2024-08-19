<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\SubmissionRequest;
use App\Jobs\ProcessSubmissions;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;

class SubmissionController extends Controller
{
    public function queueSubmission(SubmissionRequest $request)
    {
        try {
            $submissions = $request->all();
            dispatch(new ProcessSubmissions($submissions));

            return response()->json([
                "success" => true,
                "message" => "Record has been saved",
            ]);
        } catch (ValidationException $e) {
            return $e->validator->errors();
        } catch (\Throwable $e) {
            return response()->json([
                "error"=> $e->getMessage(),
            ], 500);
        }
    }
}
