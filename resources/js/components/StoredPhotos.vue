<script setup>
import { ref, defineProps } from 'vue'

const props = defineProps(['storedPhotos'])

const storedPhotos = ref(props.storedPhotos)

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
					<th>Item</th>
					<th>Current Stock</th>
					<!-- <th>Actions</th> -->
				</tr>
			</thead>
			<tbody>
				<tr v-if="storedPhotos.length === 0">
					<td colspan="2">No items available</td>
				</tr>
				<tr v-else v-for="(inventory, index) in storedPhotos" :key="index">
					<td>{{ inventory.item_label }}</td>
					<td>{{ inventory.current_stock }}</td>
					<!-- <td>
						<button @click="addToCart(item)" class="btn btn-sm btn-danger">
							Add to Cart
						</button>
					</td> -->
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
