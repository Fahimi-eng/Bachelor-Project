<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('header_title');
            $table->text('header_body');
            $table->string('about_title');
            $table->text('about_body');
            $table->string('about_dinner');
            $table->string('about_lunch');
            $table->text('footer_body');
            $table->string('instagram');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('address');
            $table->string('telephone');
            $table->text('contact');
            $table->string('logo')->default('#');
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
        Schema::dropIfExists('settings');
    }
}
