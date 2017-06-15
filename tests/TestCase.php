<?php

namespace Zoomyboy\Cronable\Tests;

use \Orchestra\Testbench\TestCase as BaseTestCase;

class TestCase extends BaseTestCase {
	public function setUp() {
		parent::setUp();
		$this->artisan('migrate', ['--database' => 'testbench']);
	}

	/**
	 * Define environment setup.
	 *
	 * @param  \Illuminate\Foundation\Application  $app
	 * @return void
	 */
	protected function getEnvironmentSetUp($app) {
		// Setup default database to use sqlite :memory:
		$app['config']->set('database.default', 'testbench');
		$app['config']->set('database.connections.testbench', [
			'driver'   => 'sqlite',
			'database' => ':memory:',
			'prefix'   => '',
		]);
	}

	protected function getPackageProviders($app) {
		return ['Zoomyboy\Cronable\ServiceProvider'];
	}
}
