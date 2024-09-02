document.addEventListener("DOMContentLoaded", function() {
    const sortSelect = document.getElementById("sort");
    const productContainers = document.querySelectorAll(".product-container");
    let originalOrder = Array.from(productContainers);

    sortSelect.addEventListener("change", function() {
        const sortBy = sortSelect.value;
        if (sortBy === "price-low-to-high") {
            sortByPriceLowToHigh();
        } else if (sortBy === "price-high-to-low") {
            sortByPriceHighToLow();
        } else if (sortBy === "default") {
            restoreOriginalOrder();
        } else if (sortBy === "featured") {
            restoreOriginalOrder();
        }
    });

    classSelect.addEventListener("change", function() {
        const classFilter = classSelect.value;
        filterByClass(classFilter);
    });

    function sortByPriceLowToHigh() {
        const sortedContainers = Array.from(productContainers).sort((a, b) => {
            const priceA = parseFloat(a.querySelector(".product-price").textContent.replace(/[^\d.]/g, ''));
            const priceB = parseFloat(b.querySelector(".product-price").textContent.replace(/[^\d.]/g, ''));
            return priceA - priceB;
        });

        reorderProductContainers(sortedContainers);
    }

    function sortByPriceHighToLow() {
        const sortedContainers = Array.from(productContainers).sort((a, b) => {
            const priceA = parseFloat(a.querySelector(".product-price").textContent.replace(/[^\d.]/g, ''));
            const priceB = parseFloat(b.querySelector(".product-price").textContent.replace(/[^\d.]/g, ''));
            return priceB - priceA;
        });

        reorderProductContainers(sortedContainers);
    }

    function restoreOriginalOrder() {
        reorderProductContainers(originalOrder);
    }

    function reorderProductContainers(containers) {
        const parentElement = productContainers[0].parentElement;
        // Remove all product containers from the DOM
        productContainers.forEach(container => {
            container.remove();
        });
        // Append sorted/filtered containers to the parent element
        containers.forEach(container => {
            parentElement.appendChild(container);
        });
    }
});