$(document).ready(function() {
    // Attach a click event listener to each "Add To Cart" button
    $('.add-to-cart-form button[type="submit"]').on('click', function(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Find the closest form
        var form = $(this).closest('form');

        // Send an AJAX request
        $.ajax({
            url: form.attr('action'),
            type: 'POST',
            data: form.serialize(), // Include form data
            success: function(response) {
                // Handle the response (e.g., show a success message)
                console.log(response);
                $('#product_count').text(response.count);
                updateCartBox(response.cart);
            },
            error: function(error) {
                // Handle errors
                console.error('Error:', error);
            }
        });
    });

    function updateCartBox(cartData) {
        // Assuming you have a cart box with id "cart-box"
        var cartBox = $('#cartContent');

        // Clear existing content
        cartBox.empty();

        // Add new content based on the updated cart data
        if (cartData.length > 0) {
            $.each(cartData, function (index, item) {
                var listItem = $('<li>').text(item.item_name + ' - Quantity: ' + item.quantity);
                cartBox.append(listItem);
            });
        } else {
            var emptyCartMessage = $('<p>').text('Your cart is empty');
            cartBox.append(emptyCartMessage);
        }
    }
});