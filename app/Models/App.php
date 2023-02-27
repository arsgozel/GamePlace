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
            $obj->slug = str()->slug($obj->name);
        });
    }


    public function types()
    {
        return $this->belongsToMany(Type::class, 'app_types')
            ->orderBy('id');
    }


    public function devices()
    {
        return $this->belongsToMany(Device::class, 'app_devices')
            ->orderBy('id');
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


    public function comments()
    {
        return $this->hasMany(Comment::class)
            ->orderBy('id', 'desc');
    }


    public function getName()
    {
        return $this->name;
    }

    public function getImage()
    {
        return $this->image ? Storage::url('a/' . $this->image) : asset('img/app.png');
    }


    public function status()
    {
        if ($this->has_add == 1) {
            return 'success';
        } elseif ($this->has_add == 0) {
            return 'danger';
        }
    }
}
