<?php
declare(strict_types=1);

namespace App\Modules\Scoring\Contracts;

interface BeforeExecutePodcastsContract
{
	public function beforeExecuted(): void;
}