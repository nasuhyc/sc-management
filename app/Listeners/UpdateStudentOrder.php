<?php

namespace App\Listeners;

use App\Events\StudentDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;


class UpdateStudentOrder
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     */
    public function handle(StudentDeleted $event): void
    {
        $studentId = $event->studentId;
        \Artisan::call('students:update-order', ['student_id' => $studentId]);

    }
}
