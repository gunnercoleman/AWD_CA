<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /*
    Here is my Club table Migration.

    This piece of code executes when i enter the command

    php artisan migrate

    Migrations define the structure of a database table. From the names of collums to its data types.
    */
    public function up(): void
    {

        /*
        Here I am creating a table called clubs with fields like name, being a string. Or fields like position being integer/number 
        */
        Schema::create('clubs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('position');
            $table->text('description')->nullabale;
            $table->string('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clubs');
    }
};
