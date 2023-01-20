<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IErrorApplication extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    protected $table = 'i_error_application';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
