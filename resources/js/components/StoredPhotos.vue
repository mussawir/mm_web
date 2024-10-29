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
	return selectedItems.value.length > 0 ? 'Order Selected' : 'Order All Items'
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
					<th>Image</th>
					<th>Item</th>
					<th>Quantity</th>
					<th>Approx Order</th>
					<th>Select</th>
				</tr>
			</thead>
			<tbody>
				<tr v-if="storedPhotos.length === 0">
					<td colspan="5">No items available</td>
				</tr>
				<tr v-else v-for="(inventory, index) in storedPhotos" :key="index">
					<td>
						<div class="d-flex align-items-center">
							<img
								class="img-fluid img-thumbnail w-50"
								:src="`/images/ai-inventory/${inventory.customer_id}/${inventory.item_image}`"
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
	</div>
</template>

<style scoped>
th {
	cursor: pointer;
	text-align: left;
}
</style>
