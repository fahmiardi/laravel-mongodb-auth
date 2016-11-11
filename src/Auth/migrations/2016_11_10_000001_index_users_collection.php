<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class IndexUsersCollection extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mongo_accounts')->collection('users', function($collection) {
            $collection->unique('id');
            $collection->index('email');
            $collection->index('password');
            $collection->index(['id' => 1, 'remember_token' => 1]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('mongo_accounts')->collection('users', function($collection) {
            $collection->dropIndex('id');
            $collection->dropIndex('email');
            $collection->dropIndex('password');
            $collection->dropIndex('id_1_remember_token');
        });
    }
}
