<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IndexPasswordResetsCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongo_accounts')->collection('password_resets', function($collection) {
            $collection->index('email');
            $collection->index(['email' => 1, 'token' => 1]);
            $collection->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongo_accounts')->collection('password_resets', function($collection) {
            $collection->dropIndex('email');
            $collection->dropIndex('email_1_token');
            $collection->dropIndex('created_at');
        });
    }
}
