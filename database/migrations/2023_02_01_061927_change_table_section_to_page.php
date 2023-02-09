<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeTableSectionToPage extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('m_section', 'm_page');

        Schema::table('m_page', function (Blueprint $table) {
            $table->renameColumn('name','heading')->nullable();
            $table->renameColumn('section','name')->nullable(false);
            $table->string('title')->nullable()->after('heading');
            $table->string('slug')->nullable()->after('title');
            $table->renameColumn('url','type')->nullable(false);
            $table->text('meta_keyword')->nullable()->after('type');
            $table->text('meta_description')->nullable()->after('meta_keyword');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('m_section', function (Blueprint $table) {
            //
        });
    }
}
