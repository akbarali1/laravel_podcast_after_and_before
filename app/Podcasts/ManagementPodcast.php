<?php
declare(strict_types=1);

namespace App\Modules\Scoring\Podcasts;

use App\Modules\Scoring\Contracts\AfterExecutePodcastsContract;

abstract class ManagementPodcast extends BasePodcast implements AfterExecutePodcastsContract
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
