<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Stagepooling extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::table('users' , function( Blueprint $table )
         {
           $table->timestamps();
           $table->timestamp('deleted_at')->nullable();
         });
         Schema::table('vehicules' , function( Blueprint $table )
           {
             $table->timestamps();
             $table->timestamp('deleted_at')->nullable();
           });
           Schema::table('stages' , function( Blueprint $table )
             {
               $table->timestamps();
               $table->timestamp('deleted_at')->nullable();
             });
             Schema::table('parkings' , function( Blueprint $table )
               {
                 $table->timestamps();
                 $table->timestamp('deleted_at')->nullable();
               });
               Schema::table('reservations' , function( Blueprint $table )
                 {
                   $table->timestamps();
                   $table->timestamp('deleted_at')->nullable();
                 });
     }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
