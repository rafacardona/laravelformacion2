<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('post', function (Blueprint $table) {
            //Añadimos nueva columna a la tabla post, el id de usuario referenciado a la tabla usuarios.
            $table->unsignedBigInteger('user_id');

            //le digo la restriccion de la refencia a la tabla
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('post', function (Blueprint $table) {
            //Para eliminar la foreign key
            $table->dropForeign('post_user_id_foreign');
            $table->dropColumn('user_id');
        });
    }
};
