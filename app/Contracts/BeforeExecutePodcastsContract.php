<?php
declare(strict_types=1);

namespace App\Contracts;

interface BeforeExecutePodcastsContract
{
	public function beforeExecuted(): void;
}