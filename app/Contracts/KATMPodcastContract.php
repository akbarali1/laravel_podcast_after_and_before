<?php
declare(strict_types=1);

namespace App\Modules\Scoring\Contracts;


interface KATMPodcastContract
{
	public function getStepModel($userId, $keyId): mixed;
	
}