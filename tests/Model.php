<?php

namespace Zoomyboy\Cronable\Tests;

use Illuminate\Database\Eloquent\Model as BaseModel;
use Zoomyboy\Cronable\Cronable;

class Model extends BaseModel {
	use Cronable;

	protected $fillable = ['title'];
}
