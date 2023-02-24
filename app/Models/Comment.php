<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [
        'id',
    ];

    public $timestamps = false;

    protected $casts = [
        'commented_at' => 'datetime',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }


    public function app()
    {
        return $this->belongsTo(App::class);
    }
}
