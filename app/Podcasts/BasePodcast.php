<?php
declare(strict_types=1);

namespace App\Modules\Scoring\Podcasts;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;

abstract class BasePodcast implements ShouldQueue
{
	
	use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
	
	public static function getInstance(string $scoringType = 'scoring'): static
	{
		if ($scoringType !== 'scoring') {
			$scoringType = Str::camel($scoringType.'_scoring');
		}
		
		return new static($scoringType);
	}
	
	public static function preScoringInstance(): static
	{
		return static::getInstance('pre');
	}
	
	public static function doScoringInstance(): static
	{
		return static::getInstance('do');
	}
	
	/**
	 * @throws ScoringException
	 * @return ScoringQueryContract
	 */
	public function getScoringQuery(): ScoringQueryContract
	{
		//TODO: shu narsani bu yerdan set qilmasdan doScoringInstance ichiga classni o`zini berib ketiladigan qilish kerak
		return match ($this->scoringType) {
			'preScoring' => UserPreScoringQuery::getInstance(),
			'doScoring'  => DoScoringQuery::getInstance(),
			default      => throw ScoringException::scoringTypeNotFound(),
		};
	}
	
	public function checkStatus(): bool
	{
		if (!isset($this->scoringModel)) {
			throw  ScoringException::notSetScoringModel();
		}
		
		if (!isset($this->stepId)) {
			throw  ScoringException::notSetStepId();
		}
		
		return $this->scoringModel->scoringSteps()
			->where('status', '=', 1)
			->where('step', '=', $this->stepId)->exists();
	}
	
}
