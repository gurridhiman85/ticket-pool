<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('position')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('photo')->nullable();
            $table->string('workphone')->nullable();
            $table->string('mobilephone')->nullable();
            $table->string('homephone')->nullable();
            $table->text('adminacess')->nullable();
            $table->text('delete')->nullable();
            $table->text('restricted')->nullable(); 
            $table->enum('status',['active','inactive'])->default('active');
            $table->rememberToken();
            $table->timestamps(); 
        });  
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
