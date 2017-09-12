<?php

namespace App;
use Illuminate\Database\Eloquent\Model;
use App\BrandsModel;
use App\CategoriesModel;
class BrandCategoryRelationsModel extends Model
{
	protected $table 	= "";
	
	const categoryId	= "";
	const brandId		= "";
	
	public function brands() {
		
		return $this->belongsTo("App\BrandsModel", self::brandId, BrandsModel::id);
	}
	
	public function categories() {
		
		return $this->belongsTo("App\CategoriesModel", self::categoryId, CategoriesModel::id);
	}
}
