<?php

namespace Zoomyboy\Cronable;

trait Cronable {
	public function cron() {
		return $this->morphOne(\Zoomyboy\Cronable\Cron::class, 'cron');
	}

	public static function bootCronable() {
		static::deleting(function($model) {
			$model->cron->delete();
		});
	}
}
