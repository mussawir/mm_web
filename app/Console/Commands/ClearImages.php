<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ClearImages extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'app:clear-images';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Restore default images for categories, items and deals.';

	/**
	 * Execute the console command.
	 */
	public function handle()
	{
		// Delete the existing 'images' folder and its contents
		$imagesFolder = public_path('images');
		if (File::exists($imagesFolder)) {
			File::deleteDirectory($imagesFolder);
		}
	
		// Extract 'images.zip' to the 'public' folder
		$zipPath = public_path('images.zip');
		$destinationPath = public_path();
	
		try {
			$zip = new \ZipArchive;
			if ($zip->open($zipPath) === TRUE) {
				$zip->extractTo($destinationPath);
				$zip->close();
				$this->info('Images extracted successfully.');
			} else {
				$this->error('Failed to extract images.');
			}
		} catch (\Exception $e) {
			$this->error('An error occurred: ' . $e->getMessage());
		}
	}
}
