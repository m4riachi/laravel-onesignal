<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToApplicationsTable extends Migration
{
    public function up()
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->unsignedBigInteger('one_signal_account_id')->nullable();
            $table->foreign('one_signal_account_id', 'one_signal_account_fk_6216856')->references('id')->on('one_signal_accounts');
        });
    }
}
