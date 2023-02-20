function initMap() {
    // Define the sunshine coast's co-ordinates
    const sunshineCoastCentre = { lat: -26.6500, lng: 153.0667 };

    // Create the map
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 11,
      center: sunshineCoastCentre,
    });
    
    // for each co-ordinate in the latitude array, create a marker
    for (let i = 0; i < lat.length; i++) {
        // create a new marker with a unique ID
        const marker = new google.maps.Marker({
            position: { lat: parseFloat(lat[i]), lng: parseFloat(long[i]) },
            map: map,
            title: street[i],
            icon: {
                url: './assets/icons/letter-b.png',
                scaledSize: new google.maps.Size(20, 20)
            }
        });
    }

    // for each co-ordinate in the dog latitude array, create a marker
    for (let i = 0; i < dogLat.length; i++) {
        // create a new marker with a unique ID
        const marker = new google.maps.Marker({
            position: { lat: parseFloat(dogLat[i]), lng: parseFloat(dogLong[i]) },
            map: map,
            title: dogStreet[i],
            icon: {
                url: './assets/icons/letter-d.png',
                scaledSize: new google.maps.Size(20, 20)
            }
        });
    }


}
