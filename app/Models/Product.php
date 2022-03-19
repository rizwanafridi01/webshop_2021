<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'products';

        protected $dates = [
            'created_at',
            'updated_at',
            'deleted_at',
        ];

        protected $guarded=[];
        protected $primaryKey = 'id';

        protected function serializeDate(DateTimeInterface $date)
        {
            return $date->format('Y-m-d H:i:s');
        }

        public function user()
        {
            return $this->belongsTo('App\Models\User','user_id','id');
        }

        public function company()
        {
            return $this->belongsTo('App\Models\Company','company_id','id');
        }

        public function sub_category()
        {
            return $this->belongsTo('App\Models\SubCategory','sub_category_id','id');
        }

        public function unites()
        {
            return $this->hasMany('App\Models\Unit');
        }

        public function product_galleries()
        {
             return $this->hasMany('App\Models\ProductGallery');
        }

        public function product_classifications()
        {
            return $this->hasMany('App\Models\ProductClassification');
        }



    public function setSlugAttribute($val)
    {
        $slug =trim(preg_replace("/[^\w\d]+/i", "-", $val),"-");
        $count = Product::where('slug','like', "%{$slug}%")->count();
        if($count > 0)
            $slug = $slug."-".($count+1);

        $this->attributes['slug'] = strtolower($slug);
    }
    public  function  getSlugAttribute($val){
        if ($val == null){
            return $this->id;
        }
        return $val;

    }
}
