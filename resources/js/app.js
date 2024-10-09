import { createApp } from 'vue';
import InventoryGenerator from './components/InventoryGenerator.vue';
import PowerGrid from './components/PowerGrid.vue';

createApp({})
	.component('InventoryGenerator', InventoryGenerator)
	.component('PowerGrid', PowerGrid)
	.mount('#app')