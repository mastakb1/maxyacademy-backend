<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DeleteColumnTableContentCarousel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('m_content_carousel', function (Blueprint $table) {
            $table->dropColumn("url");
            $table->dropColumn("status_button");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_content_carousel', function (Blueprint $table) {
            //
        });
    }
}
