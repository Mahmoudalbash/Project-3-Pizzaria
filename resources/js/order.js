//laad het script in nadat de pagina is ingeladen
document.addEventListener('DOMContentLoaded', function () {
    const basePriceElement = document.getElementById('base-price');
    const sizeSelect = document.getElementById('size');
    const ingredientInputs = document.querySelectorAll('.ingredient-input');
    const totalPriceElement = document.getElementById('total-price');

    //functie om de prijs te berekenen van de pizza
    function updatePrijs() {
        const basePrice = parseFloat(basePriceElement.value) || 0;
        const sizePrice = parseFloat(sizeSelect.options[sizeSelect.selectedIndex].dataset.price) || 1;
        let ingredientPrice = 0;

        //loop door de ingredienten en voeg de prijs toe aan de ingredientPrice
        ingredientInputs.forEach(input => {
            if (input.checked) {
                ingredientPrice += parseFloat(input.dataset.price) || 0;
            }
        });

        const totalPrice = (basePrice + ingredientPrice) * sizePrice;
        totalPriceElement.textContent = totalPrice.toFixed(2).replace('.', ',');
    }

    //kijkt of een van de ingredienten is aangevinkt of de size is veranderd
    sizeSelect.addEventListener('change', updatePrijs);
    ingredientInputs.forEach(input => input.addEventListener('change', updatePrijs));

    updatePrijs();
});
