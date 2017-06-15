<?php

namespace Zoomyboy\Cronable;

trait Cronable {
	public function cron() {
		return $this->morphOne(\Zoomyboy\Cronable\Cron::class, 'cron');
	}
}
