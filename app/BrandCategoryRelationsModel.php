<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class BrandCategoryRelationsModel extends Model
{
	protected $table 	= "";//Ez az a tábla, ami a főkategóriákat és a márkákat összekapcsolja
	
	const categoryId	= "";
	const brandId		= "";
	
	public function brands() {
		
		return $this->belongsTo("App\BrandsModel", 'boltid', 'id');
	}
	
	public function categories() {
		
		return $this->belongsTo("App\CategoriesModel", 'fid', 'id');
	}
}
