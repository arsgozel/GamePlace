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


    public function status()
    {
        if ($this->is_approved == 0) {
            return trans('app.loading');
        } elseif ($this->is_approved == 1) {
            return trans('app.approved');
        } else {
            return trans('app.not_approved');
        }
    }

    public function statusColor()
    {
        if ($this->is_approved == 0) {
            return 'warning';
        } elseif ($this->is_approved == 1) {
            return 'success';
        } else {
            return 'danger';
        }
    }
}
