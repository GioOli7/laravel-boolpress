<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            // FK
            $table->unsignedBigInteger('category_id')->nullable()->after('id');

            $table->foreign('category_id')
                    ->references('id')
                    ->on('categories')
                    ->onDelete('set null');
            //$table->foreignId('categories')->constrained();     forma abbreviata
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            // rimozione relazione
            $table->dropForeign('posts_category_id_foreign');

            // rimozione colonna
            $table->dropColumn('category_id');
        });
    }
}
