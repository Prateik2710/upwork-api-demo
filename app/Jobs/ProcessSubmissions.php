<?php

namespace App\Jobs;

use App\Events\SubmissionSaved;
use App\Models\Submission;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessSubmissions implements ShouldQueue
{
    use Queueable;

    private $submission;

    /**
     * Create a new job instance.
     */
    public function __construct(array $submission)
    {
        $this->submission = $submission;
    }

    /**
     * Execute the job.
     */
    public function handle(Submission $submission): void
    {
        try {
            $submission->create($this->submission);
            event(new SubmissionSaved($this->submission));
        } catch (\Throwable $e) {
            \Log::error(
                "Something went wrong while saving the records in submission table with job",
                [
                    "exception" => $e,
                ]
            );
        }
    }
}
