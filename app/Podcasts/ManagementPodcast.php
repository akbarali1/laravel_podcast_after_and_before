<?php
declare(strict_types=1);

namespace App\Podcasts;

use App\Contracts\AfterExecutePodcastsContract;
use App\Contracts\BeforeExecutePodcastsContract;

abstract class ManagementPodcast extends BasePodcast implements AfterExecutePodcastsContract, BeforeExecutePodcastsContract
{
	/**
	 * @return void
	 */
	final public function handle(): void
	{
		
		if (method_exists($this, 'beforeExecute')) {
			$this->beforeExecute();
		}
		
		$this->execute();
		
		if (method_exists($this, 'afterExecute')) {
			$this->afterExecute();
		}
	}
	
	abstract public function execute(): void;
	
}
