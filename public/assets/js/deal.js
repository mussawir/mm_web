document.addEventListener('DOMContentLoaded', function () {
	const radioButtons = document.querySelectorAll('input[type="radio"].form-check-input');
	const addToCartBtn = document.getElementById('addToCartBtn');

	if (!radioButtons || !addToCartBtn) {
		console.error('Required elements not found.');
		return;
	}

	function updateAddToCartButton() {
		const radioGroups = {};

		radioButtons.forEach(radio => {
			const groupName = radio.name;
			if (!radioGroups[groupName]) {
				radioGroups[groupName] = false;
			}
			if (radio.checked) {
				radioGroups[groupName] = true;
			}
			// updateRequiredText(radio);
		});

		const allGroupsChecked = Object.values(radioGroups).every(checked => checked);

		addToCartBtn.disabled = !allGroupsChecked;
	}

	// function updateRequiredText(radio) {
	// 	const requiredText = document.querySelector(`[name="${radio.name}"]`)
	// 		.parentElement.parentElement.parentElement.previousSibling.previousSibling.querySelector('.text-bg-danger');

	// 	if (requiredText) {
	// 		requiredText.textContent = '1 Selected';
	// 		requiredText.classList.remove('text-bg-danger');
	// 		requiredText.classList.add('text-bg-success');
	// 	}
	// }

	radioButtons.forEach(radio => {
		radio.addEventListener('change', function () {
			updateAddToCartButton();
			// updateRequiredText(radio);
		});
	});

	updateAddToCartButton();
});