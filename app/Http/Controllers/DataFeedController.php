<?php
namespace App\Http\Controllers;
use App\BrandsModel;
use App\CategoriesModel;
use App\BrandCategoryRelationsModel;
use Onlinepenztarca\Opkliens\api\OpActions;
class DataFeedController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(){}
	


	public function upload() {

		$brands 		= $this->getActiveBrands();
		$categories 	= $this->getActiveCategories();
		$relations		= $this->getActiveRelations();
		
		$postData = [
			"brands" 		=> $brands,
			"categories"	=> $categories,
			"relations"		=> $relations
		];
		return response()->json($postData);
	}

	public function getActiveRelations() {
		
		return BrandCategoryRelationsModel::
		select(BrandCategoryRelationsModel::categoryId. " as category_id", BrandCategoryRelationsModel::brandId."  as brand_id")
			->whereHas('brands', function ($query) {
				$query->active();
			})->whereHas('categories', function ($query){
				$query->active();
			})->get()->toArray();
	}
	
	public function getActiveBrands() {
		return BrandsModel::active()
			->select(BrandsModel::id." as id", BrandsModel::name. " as name")
			->get()->toArray();
	}
	
	public function getActiveCategories() {
		return CategoriesModel::active()
			->select(CategoriesModel::id." as id", CategoriesModel::name. " as name")
			->get()->toArray();
	}
}
