<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'sub_categories';

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

        public function category()
        {
            return $this->belongsTo('App\Models\Category','category_id','id');
        }

        public function product(){
            return $this->hasMany('App\Models\Product');
        }

    public function setSlugAttribute($val)
    {
        $slug =trim(preg_replace("/[^\w\d]+/i", "-", $val),"-");
        $count = SubCategory::where('slug','like', "%{$slug}%")->count();
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

//        public function sub_categories()
//        {
//            return $this->hasMany('App\Models\SubCategory');
//        }
}
