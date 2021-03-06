<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class CategoriesModel extends Model
{
	protected $table = "";
	
    const id 			= "";
	const name 			= "";
	const status 		= "";
	const activeStatus	= 1;
	
	public function scopeActive($query) {
		
		return $query->where(self::status, self::activeStatus)->where("id","<",4);
	}
	
}
