<?php

namespace App\Observers;
use App\Models\Submission;

class SubmissionObserver
{
    public function created(Submission $submission)
    {
        \Log::info(
            "Submission saved successfully.",
            [
                "name"  => $submission->name,
                "email" => $submission->email,
            ]
        );
    }
}
