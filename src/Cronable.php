<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cronable extends Model
{
    public $fillable = ['interval', 'weekday', 'day', 'time'];

	public function cronable() {
		return $this->morphTo();
	}
}
