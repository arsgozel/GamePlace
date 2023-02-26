<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    protected static function booted()
    {
        static::saving(function ($obj) {
            $obj->slug = str()->slug($obj->name_tm);
        });
    }

    public function apps()
    {
        return $this->belongsToMany(App::class, 'app_types')
            ->orderByPivot('name_tm');
    }


    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }


    public function child()
    {
        return $this->hasMany(self::class, 'parent_id')
            ->orderBy('sort_order')
            ->orderBy('name_tm');
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
        return $this->image ? Storage::url('c/' . $this->image) : asset('img/category.jpg');
    }
}
