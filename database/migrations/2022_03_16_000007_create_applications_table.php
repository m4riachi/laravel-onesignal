<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('onesignal_app')->unique();
            $table->string('rest_api_key')->unique();
            $table->string('name')->nullable();
            $table->integer('active_user')->nullable();
            $table->boolean('enabled')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
