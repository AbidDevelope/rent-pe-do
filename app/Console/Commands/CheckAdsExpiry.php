<?php

namespace App\Console\Commands;

use App\Models\Ads;
use App\Models\UserSubscription;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class CheckAdsExpiry extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ads:check-expiry';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check if ads are expired';

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
        $ads = Ads::all();

        foreach ($ads as $ad) {
            if ($ad->expired_at < now()) {
                $media = $ad->media;
                $ad->delete();
                if ($media && Storage::exists($media->src)) {
                    Storage::delete($media->src);
                    $media->delete();
                }
            }
        }

        $this->info('Ads expiry check completed and expired ads deleted.');
    }
}
