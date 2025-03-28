$(document).ready(function () {
    $('#forecastForm').on('submit', function (e) {
        e.preventDefault(); // Prevent default form submission

        const formData = {
            postcode: $('#postcode').val(), // Grab hidden postcode, not suburb name
            year: $('select[name="year"]').val(),
            month: $('select[name="month"]').val(),
            rooms: $('select[name="rooms"]').val(),
            bathroom: $('select[name="bathroom"]').val(),
            car: $('select[name="car"]').val(),
            landsize: $('select[name="landsize"]').val(),
            buildingarea: $('select[name="buildingarea"]').val(),
            distance: $('select[name="distance"]').val()
        };

        // MOCK response (easy to delete later)
        const mockResponse = {
            forecast: `$${(500000 + Math.random() * 500000).toFixed(0)} (mocked price)`
        };

        // Display the mock result
        $('#forecastResult')
            .html(`<strong>Predicted Price:</strong> ${mockResponse.forecast}`)
            .slideDown();

        // To use real API, just uncomment this block and delete the mock section above:
        /*
        $.ajax({
            url: 'https://your-api-url.com/forecast', // Replace with your actual API endpoint
            type: 'POST',
            contentType: 'application/json',
            data: JSON.stringify(formData),
            success: function (response) {
                console.log('Forecast result:', response);
                $('#forecastResult')
                    .html(`<strong>Predicted Price:</strong> ${response.forecast}`)
                    .slideDown();
            },
            error: function (xhr, status, error) {
                console.error('Error submitting forecast:', error);
                alert('Failed to get forecast. Please try again.');
            }
        });
        */
    });
});
