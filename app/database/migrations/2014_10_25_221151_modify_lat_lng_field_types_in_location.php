<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyLatLngFieldTypesInLocation extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('locations', function($table) {
    		$table->dropColumn('lat');
    		$table->dropColumn('lng');
		});
		
		Schema::table('locations', function($table) {
    		$table->integer('lat');
    		$table->integer('lng');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('locations', function($table) {
    		$table->dropColumn('lat');
    		$table->dropColumn('lng');
		});
		
		Schema::table('locations', function($table) {
    		$table->float('lat');
    		$table->float('lng');
		});
	}

}
