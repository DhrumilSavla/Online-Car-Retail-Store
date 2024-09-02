document.addEventListener("DOMContentLoaded", function() {
    const brandDropdown = document.getElementById('brands');
    const classDropdown = document.getElementById('classes');
    const productContainers = document.querySelectorAll('.product-container');

    brandDropdown.addEventListener('change', filterProducts);
    classDropdown.addEventListener('change', filterProducts);

    function filterProducts() {
        const selectedBrand = brandDropdown.value;
        const selectedClass = classDropdown.value;

        productContainers.forEach(container => {
            const brand = container.querySelector('.product-page').getAttribute('data-brand');
            const productClass = container.querySelector('.product-page').getAttribute('data-class');

            const brandMatch = selectedBrand === 'default' || brand === selectedBrand;
            const classMatch = selectedClass === 'default' || productClass === selectedClass;

            if (brandMatch && classMatch) {
                container.style.display = 'block';
            } else {
                container.style.display = 'none';
            }
        });
    }
});