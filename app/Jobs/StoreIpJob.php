<?php

namespace App\Jobs;

use App\Services\IpServices;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class StoreIpJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $shortId;
    protected $ip;

    /**
     * Create a new job instance.
     */
    public function __construct($shortId, $ip)
    {
        $this->shortId = $shortId;
        $this->ip = $ip;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        IpServices::store($this->shortId, $this->ip);
    }
}
