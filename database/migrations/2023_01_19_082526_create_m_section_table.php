<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMSectionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_section', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('url')->nullable();
            $table->text('description')->nullable();
            $table->integer('status');
            $table->dateTime('created_at')->useCurrent();
            $table->integer('created_id');
            $table->dateTime('updated_at')->useCurrent()->onUpdate(DB::raw('CURRENT_TIMESTAMP'));
            $table->integer('updated_id');
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
