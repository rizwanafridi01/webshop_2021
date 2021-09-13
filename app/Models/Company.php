<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'companies';

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

        public function states()
        {
            return $this->hasMany('App\Models\State');
        }

        public function cities()
        {
            return $this->hasMany('App\Models\City');
        }

        public function region()
        {
            return $this->belongsTo('App\Models\Region','region_id','id');
        }

        public function regions()
        {
            return $this->hasMany('App\Models\Region');
        }

        public function banks()
        {
            return $this->hasMany('App\Models\Bank');
        }

        public function products()
        {
            return $this->hasMany('App\Models\Product');
        }

        public function unites()
        {
            return $this->hasMany('App\Models\Unit');
        }
}
