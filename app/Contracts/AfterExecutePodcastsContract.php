<?php
declare(strict_types=1);

namespace App\Modules\Scoring\Contracts;

interface AfterExecutePodcastsContract
{
	public function afterExecute(): void;
}