<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLitUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('lit_user', function($table) {
			$table->integer('user_id')->unsigned();
			$table->foreign('user_id')->references('id')->on('users');
			$table->integer('lit_id')->unsigned();
			$table->foreign('lit_id')->references('id')->on('lits');
			$modes = array('currently_reading', 'to_read', 'have_read');
			$table->enum('mode', $modes);
			$table->date('started');
			$table->date('finished');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('lit_user');
	}

}
