<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\SendMeetingPack;
use Illuminate\Support\Facades\Mail;

class SendMeetingPackJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public $meeting;
    public $user;
    public $data;

    public function __construct($meeting, $user, $data)
    {
        $this->meeting = $meeting;
        $this->user= $user;
        $this->data= $data;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to($this->user)->send(new SendMeetingPack($this->meeting, $this->data));
    }
}
