<?php

namespace App\Observers;

use App\Models\Task;
use Illuminate\Validation\ValidationException;

class TaskObserver
{
    /**
     * Handle the task "saving" event.
     *
     * @param  \App\Models\Task  $task
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function saving(Task $task)
    {
        $validator = \Validator::make($task->toArray(), [
            'name' => 'required|max:255',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            throw new ValidationException($validator);
        }
    }
}
