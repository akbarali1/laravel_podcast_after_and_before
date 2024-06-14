<?php
declare(strict_types=1);

namespace App\Modules\Scoring\Contracts;

use App\Modules\User\Contracts\ScoringModelContract;

interface KATMCommandContract
{
	public static function podcastExecut(string $scoringId, ScoringModelContract $model): void;
}