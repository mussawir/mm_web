import { js } from 'laravel-mix';

js('resources/js/app.js')
	.vue({
		version: 3,
	})
	.postCss('resources/css/app.css', 'public/css', [
		//
	]);