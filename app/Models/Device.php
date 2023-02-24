<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    public function apps()
    {
        return $this->belongsToMany(App::class, 'app_types')
            ->orderByPivot('name_tm');
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
