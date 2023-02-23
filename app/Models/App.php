<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class App extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected static function booted()
    {
        static::saving(function ($obj) {
            $obj->slug = str()->slug($obj->full_name_tm);
        });
    }


    public function types()
    {
        return $this->belongsToMany(Type::class, 'app_types')
            ->orderByPivot('sort_order');
    }


    public function age_rating()
    {
        return $this->belongsTo(CharacteristicValue::class, 'age_rating_id', 'id');
    }


    public function language()
    {
        return $this->belongsTo(CharacteristicValue::class, 'language_id');
    }


    public function characteristicValues()
    {
        return $this->belongsToMany(CharacteristicValue::class, 'app_characteristic_value')
            ->orderByPivot('sort_order');
    }


    public function images()
    {
        return $this->hasMany(AppImage::class)
            ->orderBy('id');
    }


    public function getName()
    {
        if (app()->getLocale() == 'en') {
            return $this->name_en ?: $this->name_tm;
        } else {
            return $this->name_tm;
        }
    }

    public function getImage()
    {
        return $this->image ? Storage::url('a/' . $this->image) : asset('img/app.jpg');
    }
}
