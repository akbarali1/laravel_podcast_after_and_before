<?php
declare(strict_types=1);

namespace App\Podcasts;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

abstract class BasePodcast implements ShouldQueue
{
	
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
	
}
