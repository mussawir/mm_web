<script setup>
import { ref, defineProps, computed } from 'vue'

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

const buttonLabel = computed(() => {
	return selectedItems.value.length > 0 ? 'Order Checked Items' : 'Order All Items'
})

const orderItems = () => {
	const itemsToOrder = selectedItems.value.length > 0
		? selectedItems.value.map(index => storedPhotos.value[index])
		: storedPhotos.value
		
		console.log('Ordering items:', itemsToOrder)
}
</script>

<template>
	<div class="row mb-2">
		<div class="col-md-12 text-md-end text-center">
			<a href="javascript:void(0);" class="btn btn-danger" @click="orderItems">
				{{ buttonLabel }}
			</a>
		</div>
	</div>
	<div class="text-nowrap">
		<table class="table table-hover">
			<thead>
				<tr>
					<th>Select</th>
					<th>Image</th>
					<th>Item</th>
					<th>Current Stock</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				<tr v-if="storedPhotos.length === 0">
					<td colspan="5">No items available</td>
				</tr>
				<tr v-else v-for="(inventory, index) in storedPhotos" :key="index">
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
								<span class="sr-only">Item Checkbox</span>
							</label>
						</div>
					</td>
					<td>
						<div class="d-flex align-items-center">
							<img
								class="img-fluid img-thumbnail"
								:src="`/images/vendors/${inventory.item.vendor_id}/items/150x150/${inventory.item.image}`"
								alt="Item image"
							/>
						</div>
					</td>
					<td>{{ inventory.item_label }}</td>
					<td>{{ inventory.current_stock }}</td>
					<td>
						<button @click="addToCart(inventory)" class="btn btn-sm btn-danger">
							Approx Order
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
