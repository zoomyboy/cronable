<?php

namespace Zoomyboy\Cronable;

use Illuminate\Support\ServiceProvider as GlobalServiceProvider;

class ServiceProvider extends GlobalServiceProvider {
	public function boot() {
		$this->loadMigrationsFrom(__DIR__.'/Migrations');

		if(app()->environment() == 'testing') {
			$this->loadMigrationsFrom(__DIR__.'/../tests/Migrations');
		}
	}
}
