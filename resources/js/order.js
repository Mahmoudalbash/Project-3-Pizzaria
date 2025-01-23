document.addEventListener('DOMContentLoaded', function () {
    const formatSelect = document.getElementById('format_id');
    const ingredientInputs = document.querySelectorAll('.ingredient-input');
    const totalPriceElement = document.getElementById('total-price');

    // Update total price
    function updateTotalPrice() {
        let basePrice = parseFloat("{{ $pizza->price }}");
        let formatPrice = parseFloat(formatSelect.options[formatSelect.selectedIndex].dataset.price || 0);
        let ingredientsPrice = 0;

        ingredientInputs.forEach(input => {
            if (input.checked) {
                ingredientsPrice += parseFloat(input.dataset.price || 0);
            }
        });

        let totalPrice = (basePrice + ingredientsPrice) * formatPrice;
        totalPriceElement.textContent = totalPrice.toFixed(2);
    }

    formatSelect.addEventListener('change', updateTotalPrice);
    ingredientInputs.forEach(input => {
        input.addEventListener('change', updateTotalPrice);
    });

    // Initial price update
    updateTotalPrice();
});
