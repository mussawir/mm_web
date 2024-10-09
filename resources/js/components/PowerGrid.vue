<script setup>
import { ref, defineProps } from 'vue'

const props = defineProps(['inventoryData'])

const inventoryData = ref(props.inventoryData)

// Sorting
const sortColumn = ref('location')
const sortAsc = ref(true)

const sortData = (column) => {
	if (sortColumn.value === column) {
		sortAsc.value = !sortAsc.value
	} else {
		sortColumn.value = column
		sortAsc.value = true
	}

	inventoryData.value.sort((a, b) => {
		if (a.item_details[column] > b.item_details[column]) return sortAsc.value ? 1 : -1
		if (a.item_details[column] < b.item_details[column]) return sortAsc.value ? -1 : 1
		return 0
	})
}
</script>

<template>
	<div class="text-nowrap">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Location</th>
					<th>Type</th>
					<th>Store Room</th>
					<th>Rack Number</th>
					<th>Number</th>
					<th>Item</th>
					<th>Capacity</th>
					<th>Quantity</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(inventory, index) in inventoryData" :key="index">
					<td>{{ inventory.location.name }}</td>
					<td>{{ inventory.location.type }}</td>
					<td>{{ inventory.location.store_room }}</td>
					<td>{{ inventory.location.rack }}</td>
					<td>{{ inventory.location.rack_location }}</td>
					<td>{{ inventory.item.name }}</td>
					<td>{{ inventory.capacity }}</td>
					<td>
						<input
							type="text"
							class="form-control"
							v-model="inventory.reorder_quantity"
							readonly
						/>
					</td>
					<td>
						<button @click="addToCart(item)" class="btn btn-sm btn-danger">
							Add to Cart
						</button>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</template>

<style scoped>
th {
	cursor: pointer;
	text-align: left;
}
</style>
