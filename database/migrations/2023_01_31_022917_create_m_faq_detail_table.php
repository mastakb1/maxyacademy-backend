<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMFaqDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_faq_detail', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_faq');
            $table->text('name');
            $table->text('description');
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
        Schema::table('m_faq_detail', function (Blueprint $table) {
            //
        });
    }
}
