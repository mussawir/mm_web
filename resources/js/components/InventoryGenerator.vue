<script setup>
import { ref } from 'vue'
import axios from '../lib/axios'

const customerId = ref('')
const updateStatus = ref('')

const updateInventory = async () => {
	if (customerId.value) {
		try {
		const response = await axios.post('/api/v1/inventory/update', { customer_id: customerId.value })
		if (response.status === 200) {
			updateStatus.value = `Update finished`
		} else {
			updateStatus.value = `Failed to update inventory`
		}
		} catch (error) {
		updateStatus.value = 'Error: ' + error.response?.data?.message || 'API call failed'
		} finally {
		customerId.value = ''
		}
	} else {
		updateStatus.value = 'No ID provided'
	}
}
</script>

<template>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6 mx-auto bg-secondary-subtle p-4 rounded-4">
			<div class="d-flex justify-content-center align-items-center mb-3">
				<input
					v-model="customerId"
					id="customer-id"
					type="text"
					class="form-control w-50"
					placeholder="Customer ID"
				/>
			</div>

			<div class="d-flex justify-content-center mb-3">
				<button
					@click="updateInventory"
					class="btn btn-primary"
					>
					Update Inventory
				</button>
			</div>
			<div v-if="updateStatus" class="alert alert-success fw-medium text-center">
				{{ updateStatus }}
			</div>
		</div>
		<div class="col-md-3"></div>
	</div>
</template>