<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Phone extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id", "phone_number"
    ];

    //le indicamos cual es su user
    public function user() : BelongsTo{

        return $this->belongsTo(User::class);
    }
}