<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'categories';

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

    public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id','id');
    }


    public function sub_categories()
    {
        return $this->hasMany('App\Models\SubCategory');
    }

    public function sub_categories_odd()
    {
        return $this->hasMany('App\Models\SubCategory')->whereRaw('id % 2 != 0');
    }

    public function sub_categories_even()
    {
        return $this->hasMany('App\Models\SubCategory')->whereRaw('id % 2 = 0');
    }


}
