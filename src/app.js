// Execute JavaScript on page load
$(function() {
    // Initialize phone number text input plugin
    $('#userPhone, #salesPhone').intlTelInput({
        responsiveDropdown: true,
        autoFormat: true,
        utilsScript: '/vendor/intl-phone/libphonenumber/build/utils.js'
    });

    // Intercept form submission and submit the form with ajax
    $('#contactForm').on('submit', function(e) {
        // Prevent submit event from bubbling and automatically submitting the
        // form
        e.preventDefault();

        // Call our ajax endpoint on the server to initialize the phone call
        $.ajax({
            url: '/call.php',
            method: 'POST',
            dataType: 'json',
            data: {
                userPhone: $('#userPhone').val(),
                salesPhone: $('#salesPhone').val()
            }
        }).done(function(data) {
            // The JSON sent back from the server will contain a success message
            alert(data.message);
        }).fail(function(error) {
            alert(error.responseText);
        });
    });
});
