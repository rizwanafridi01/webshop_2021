<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'cities';

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

        public function state()
        {
            return $this->belongsTo('App\Models\State','state_id','id');
        }

        public function company()
        {
            return $this->belongsTo('App\Models\Company','company_id','id');
        }

        public function regions()
        {
            return $this->hasMany('App\Models\Region');
        }
}
