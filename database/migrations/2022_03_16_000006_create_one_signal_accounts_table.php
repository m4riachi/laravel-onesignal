<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOneSignalAccountsTable extends Migration
{
    public function up()
    {
        Schema::create('one_signal_accounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('user_auth_key')->unique();
            $table->boolean('enabled')->default(0)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
