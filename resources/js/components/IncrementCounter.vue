<script setup>
import { ref } from 'vue'

const counter = ref(0)
</script>

<template>
	<button
		type="button"
		@click="counter++"
		class="p-2 rounded bg-secondary-subtle"
	>
		Counter 1: {{ counter }}
	</button>
</template>