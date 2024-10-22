import { createApp } from 'vue';
import InventoryGenerator from './components/InventoryGenerator.vue';
import PowerGrid from './components/PowerGrid.vue';
import StoredPhotos from './components/StoredPhotos.vue';

createApp({})
	.component('InventoryGenerator', InventoryGenerator)
	.component('PowerGrid', PowerGrid)
	.component('StoredPhotos', StoredPhotos)
	.mount('#app')