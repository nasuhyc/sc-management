<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;
use Illuminate\Support\Facades\Log;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class UpdateStudentOrderCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'students:update-order {student_id}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the order of students in the same school after the specified student';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $studentId = $this->argument('student_id');
        $student=Student::withTrashed()->where('id', $studentId)->first();

        //Message Context
        $data = "This is a " . $student->name . " The order of students in the same school was updated after the specified student was successfully deleted.";

        log::info($student);
        $schoolId = $student->school_id;
        $studentOrder = $student->order;
        log::info(message: "------------------------------------------------------------");
        $students = Student::where('school_id', $schoolId)
            ->where('order', '>=', $studentOrder)
            ->orderBy('order')
            ->get();
        $order = $studentOrder;
        foreach ($students as $student) {
            $student->update(['order' => $order]);
            $order++;
        }
        $this->info('Student order updated successfully.');
        Mail::to(auth()->user()->email)->send(
            new SendMail($data)
        );

    }




}
