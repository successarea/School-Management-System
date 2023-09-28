<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Exam;
class DeleteOldExams extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exam:delete-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete exams that are older than 4 days';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sevenDayAgo = Carbon::now()->subDays(7);

        Exam::where('created_at', '<', $sevenDayAgo)->delete();

        $this->info('Exams older than 7 days have been deleted.');

        return true;
    }
}
