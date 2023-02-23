<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CharacteristicValue extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;


    public function characteristic()
    {
        return $this->belongsTo(Characteristic::class);
    }


    public function apps()
    {
        return $this->belongsToMany(App::class, 'app_characteristic_value')
            ->orderBy('id', 'desc');
    }


    public function getName()
    {
        if (app()->getLocale() == 'en') {
            return $this->name_en ?: $this->name_tm;
        } else {
            return $this->name_tm;
        }
    }
}
