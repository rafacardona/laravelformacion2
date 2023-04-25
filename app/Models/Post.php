<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    /*
     * Aqui se indica el nombre de la tabla a la que se hace referencia, por defecto suele ser el plural del
     * nombre de la clase. En este caso seria "POSTS" pero mi tabla se llama POST por eso se lo indico.
     */
    protected $table = "post";


    protected $fillable = [
        "user_id", "tittle", "content"
    ];

    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
