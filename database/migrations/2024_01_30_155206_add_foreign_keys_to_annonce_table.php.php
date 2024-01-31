<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToAnnonceTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('annonces', function(Blueprint $table)
		{
			$table->foreign('enreprise_id', 'FK_annonces_entreprises')->references('id')->on('entreprises')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('annonces', function(Blueprint $table)
		{
			$table->dropForeign('FK_annonces_entreprises');
		});
	}

}