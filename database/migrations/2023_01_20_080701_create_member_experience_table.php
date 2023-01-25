<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_experience', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_member');
            $table->string('name');
            $table->string('job_type');
            $table->string('company');
            $table->string('industry');
            $table->string('location');
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::table('member_experience', function (Blueprint $table) {
            //
        });
    }
}
