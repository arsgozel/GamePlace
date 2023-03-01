<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Device extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    public function apps()
    {
        return $this->belongsToMany(App::class, 'app_types')
            ->orderBy('name_tm');
    }


    public function getName()
    {
        if (app()->getLocale() == 'en') {
            return $this->name_en ?: $this->name_tm;
        } elseif (app()->getLocale() == 'ru'){
            return $this->name_ru ?: $this->name_tm;
        } else {
            return $this->name_tm;
        }
    }

    public function getImage()
    {
        return $this->image ? Storage::url('d/' . $this->image) : asset('img/device.jpg');
    }
}
