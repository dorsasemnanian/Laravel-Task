<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class RenameUserIdToUserIdInPostsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Use raw SQL to rename the column
        DB::statement('ALTER TABLE posts CHANGE user_id userId BIGINT UNSIGNED');
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Use raw SQL to revert the column name
        DB::statement('ALTER TABLE posts CHANGE userId user_id BIGINT UNSIGNED');
    }
}