document.addEventListener('DOMContentLoaded', function() {
    const basePriceElement = document.getElementById('base-price');
    const sizeSelect = document.getElementById('size');
    const ingredientInputs = document.querySelectorAll('.ingredient-input');
    const totalPriceElement = document.getElementById('total-price');

    function updatePrijs() {
        const basePrice = parseFloat(basePriceElement.value) || 0;

        let selectedsize = sizeSelect.options[sizeSelect.selectedIndex];
        console.log(selectedsize);
        let dataset = selectedsize.dataset;
        console.log(dataset);
        let price = dataset.price;
        console.log(price);
        const sizePrice = parseFloat(sizeSelect.options[sizeSelect.selectedIndex].dataset.price) || 1;
        let ingredientPrice = 0;

        ingredientInputs.forEach(input => {
            if (input.checked) {
                ingredientPrice += parseFloat(input.dataset.price) || 0;
            }
        });

        const totalPrice = (basePrice + ingredientPrice) * sizePrice;
        totalPriceElement.textContent = totalPrice.toFixed(2).replace('.', ',');
    }

    sizeSelect.addEventListener('change', updatePrijs);
    ingredientInputs.forEach(input => input.addEventListener('change', updatePrijs));

    updatePrijs();
});
