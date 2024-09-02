document.getElementById("bookNowBtn").addEventListener("click", function() {
    // Get the product details
    var productName = document.getElementById("productName").innerText;
    var productImage = document.getElementById("productImage").src;
    var productIntro = document.getElementById("product-intro").innerText;

    // Encode the data to pass it through URL
    var encodedName = encodeURIComponent(productName);
    var encodedImage = encodeURIComponent(productImage);
    var encodedIntro = encodeURIComponent(productIntro);

    // Construct the URL with parameters
    var bookingURL = "booking.html?name=" + encodedName + "&image=" + encodedImage + "&intro=" + encodedIntro;

    // Redirect to the booking page with the product details
    window.location.href = bookingURL;
});