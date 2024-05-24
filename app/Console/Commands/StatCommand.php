<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\StatMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Comment;
use Carbon\Carbon;




class StatCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stat';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $commentCount = Comment::whereDate('created_at', Carbon::today()) -> count();
        Mail::to('alex-yurlov@mail.ru')->send(new StatMail($commentCount));
    }
}
