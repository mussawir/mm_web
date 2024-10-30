<script setup>
import axios from 'axios';
import { ref, computed } from 'vue'

const props = defineProps(['storedPhotos'])
const storedPhotos = ref(props.storedPhotos)

const selectedItems = ref([])

const toggleSelection = (index) => {
	if (selectedItems.value.includes(index)) {
		selectedItems.value = selectedItems.value.filter(i => i !== index)
	} else {
		selectedItems.value.push(index)
	}
}

const approximateOrder = (currentStock, capacity) => {
	const stockPercentage = parseFloat(currentStock)
	return Math.round((1 - stockPercentage / 100) * capacity)
}

const buttonLabel = computed(() => {
	return selectedItems.value.length > 0 ? 'Order Selected' : 'Order All Items'
})

const orderItems = async () => {
	const itemsToOrder = selectedItems.value.length > 0
	? selectedItems.value.map(index => storedPhotos.value[index])
	: storedPhotos.value
	
	// console.log(itemsToOrder)

	try {
		const response = await axios.post('/cart/add', {
			type: 'item',
			items: itemsToOrder.map(item => ({
				id: item.item_id,
				quantity: approximateOrder(item.current_stock, item.inventory_map.capacity),
			})),
		})
		
		console.log(response.data)
		// Handle success response
	} catch (error) {
		console.error(error)
		// Handle error response
	}
}

// Added for debugging
// Can be called on a @click
const log = (data) => {
	console.log(data)
};
</script>

<style>
.table {
	max-width: none;
	table-layout: fixed;
	word-wrap: break-word;
}
th {
	cursor: pointer;
	text-align: left;
}
.table-hover tbody tr:hover {
	background-color: #f5f5f5; /* Add a hover effect */
}
</style>

<template>
	<div class="row mb-2">
		<div class="col-md-12 text-md-end text-center">
			<a href="javascript:void(0);" class="btn btn-danger" @click="orderItems">
				{{ buttonLabel }}
			</a>
		</div>
	</div>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>Image</th>
				<th>Item</th>
				<th>Quantity</th>
				<th>Approx Order</th>
				<th>Select</th>
			</tr>
		</thead>
		<tbody>
			<tr v-if="storedPhotos.length === 0">
				<td colspan="5">No items available. Please add items to the inventory.</td>
			</tr>
			<tr v-else v-for="(inventory, index) in storedPhotos" :key="index" @click="log(inventory)">

				<td>
					<div class="d-flex align-items-center">
						<img
							class="img-fluid img-thumbnail w-75"
							:src="`/images/ai-inventory/${inventory.customer_id}/${inventory.item_image}`"
							alt="Item image"
						/>
					</div>
				</td>
				<td>{{ inventory.item_label }}</td>
				<td>{{ inventory.current_stock }}</td>
				<td>
					<span v-if="inventory.inventory_map && inventory.inventory_map.capacity">
						{{ approximateOrder(inventory.current_stock, inventory.inventory_map.capacity) }}
						(Total Capacity: <strong>{{ inventory.inventory_map.capacity }}</strong> pieces)
					</span>
					<span v-else>No capacity data</span>
				</td>
				<td>
					<div class="form-check">
						<input
							class="form-check-input"
							type="checkbox"
							:id="`itemCheck${index}`"
							:value="index"
							@change="toggleSelection(index)"
							:checked="selectedItems.includes(index)"
						/>
						<label class="form-check-label" :for="`itemCheck${index}`">
							Select Item
						</label>
					</div>
				</td>
			</tr>
		</tbody>
	</table>
</template>
