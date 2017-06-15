<?php

namespace Zoomyboy\Cronable\Tests;

use Zoomyboy\Cronable\Tests\TestCase;
use Zoomyboy\Cronable\Cron;
use Zoomyboy\Cronable\Tests\Model;

class ModelTest extends TestCase {
	/** @test */
	public function it_creates_a_cron_model_on_the_db() {
		//Every 7th day in a month at 03:00
		$model = new Model(['title' => 'A']);
		$model->save();
		$model = Model::find($model->id);
		$this->assertEquals('A', $model->title);

	}

	/** @test */
	public function it_creates_a_cronable_model_on_the_db_and_saves_it_to_a_model() {
		$model = Model::create(['title' => 'A']);
		$model->save();
		$id = $model->id;

		$cron = new Cron([
			'time' => '03:00',
			'day' => 7,
			'weekday' => null,
			'interval' => 3
		]);
		$model->cron()->save($cron);

		$this->assertEquals(0, $model->cron->minute);
		$this->assertEquals(3, $model->cron->hour);
		$this->assertEquals(7, $model->cron->day);
		$this->assertNull($model->cron->weekday);
		$this->assertEquals(3, $model->cron->interval);
		$this->assertEquals($model->interval, $model->cron->model->interval);
	}
}
