document.getElementById('contactDealerBtn').addEventListener('click', function() {
    // Get product details
    var productImageSrc = document.getElementById('productImage').src;
    var productName = document.getElementById('productName').textContent;

    // Construct URL with product details as query parameters
    var bookingPageUrl = 'booking.html?image=' + encodeURIComponent(productImageSrc) + '&name=' + encodeURIComponent(productName);

    // Open new page
    window.open(bookingPageUrl, '_blank');
});