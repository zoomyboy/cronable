<?php

namespace Zoomyboy\Cronable\Tests;

use Zoomyboy\Cronable\Cron;

class CronStringTest extends TestCase {
	/** @test */
	public function it_reads_monthly_schedule() {
		$model = Model::create(['title' => 'A']);
		$model->save();
		$id = $model->id;

		$cron = new Cron([
			'weekday' => null,
			'day' => 7,
			'time' => '03:00',
			'interval' => 3
		]);
		$model->cron()->save($cron);

		$this->assertEquals('0 3 7 * *', $model->cron->string);
	}

	/** @test */
	public function it_reads_weekly_schedule() {
		$model = Model::create(['title' => 'A']);
		$model->save();
		$id = $model->id;

		$cron = new Cron([
			'weekday' => 4, 
			'day' => null,
			'time' => '03:00',
			'interval' => 2
		]);
		$model->cron()->save($cron);

		$this->assertEquals('0 3 * * 4', $model->cron->string);
	}

	/** @test */
	public function it_reads_daily_schedule() {
		$model = Model::create(['title' => 'A']);
		$model->save();
		$id = $model->id;

		$cron = new Cron([
			'weekday' => null, 
			'day' => null,
			'time' => '03:00',
			'interval' => 1
		]);
		$model->cron()->save($cron);

		$this->assertEquals('0 3 * * *', $model->cron->string);
	}
}
