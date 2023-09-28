<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;
use App\Models\Feedback;
class DeleteOldFeedbacks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feedback:delete-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Feedbacks Older than 1 month.';

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
        $oneMonthAgo = now()->subMonth();
        $deletedCount = Feedback::where('created_at', '<', $oneMonthAgo)->delete();
        $this->info("Deleted {$deletedCount} feedbacks older than one month.");
    }
}
