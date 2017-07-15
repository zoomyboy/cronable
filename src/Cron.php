<?php

namespace Zoomyboy\Cronable;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Cron extends BaseModel {
	public $fillable = ['weekday', 'day', 'time', 'interval'];

	public function model() {
		return $this->morphTo('cron');	
	}

	public function getStringAttribute() {
		switch($this->interval) {
			case 1:
				//Daily
				return "* * * * *";
				return "{$this->minute} {$this->hour} * * *";
			case 2:
				//Weekly
				return "{$this->minute} {$this->hour} * * {$this->weekday}";
			case 3:
				//Monthly
				return "{$this->minute} {$this->hour} {$this->day} * *";
		}
	}

	public function getMinuteAttribute() {
		$parts = explode(':', $this->time);
		return (int)$parts[1];
	}

	public function getHourAttribute() {
		$parts = explode(':', $this->time);
		return (int)$parts[0];
	}

	public static function runSchedule($schedule) {
		foreach(self::get() as $cron) {
			$schedule->call(function() use ($cron) {
				$cron->model->runCron($cron);
			})->cron($cron->string);
		}
	}
}

