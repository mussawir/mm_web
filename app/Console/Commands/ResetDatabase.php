<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class ResetDatabase extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'app:reset-database';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Reset the database to its default state.';

	/**
	 * Execute the console command.
	 */
	public function handle()
	{
		//Use the db:seed command to reset the database
		Artisan::call('db:seed');

		//Display a success message
		$this->info('Database reset successfully.');
	}
}
