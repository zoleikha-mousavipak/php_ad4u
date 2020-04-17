require('./bootstrap');

$("#locationButton").click(function () { //user clicks button
    if ("geolocation" in navigator) { //check geolocation available
        //try to get user current location using getCurrentPosition() method
        navigator.geolocation.getCurrentPosition(function (position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
            var location = "https://maps.google.com/maps?q=" + latitude + "," + longitude + "&z=15&output=embed";
            $('#userLocation').attr('src', location);
            $('#userLocation').removeClass('hidden');
            $('#userLatitude').val(latitude);
            $('#userLongitude').val(longitude);
            $('#adSubmitButton').attr('disabled', false);
        });
    } else {
        alert("Browser doesn't support geolocation!");
    }
});
