<x-RecycleLayout>
    <!-- Include Leaflet CSS and JavaScript -->
    <link rel="stylesheet" href="{{ asset('leaflet/dist/leaflet.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
      integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
      crossorigin=""></script>

    <main id="main">
        <style>
            main {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                color: #333;
                margin: 0;
                padding: 20px;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                min-height: 100vh;
                padding-top: 100px; /* Added padding to prevent overlapping with navigation */
            }

            .container {
                text-align: center;
                padding: 20px;
                max-width: 800px;
                background-color: #fff;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                border-radius: 10px;
                width: 100%;
            }

            h1 {
                font-size: 2.5em;
                color: #333;
                font-weight: bold;
                margin-bottom: 10px;
            }

            h5 {
                font-size: 1.5em;
                color: #555;
                font-weight: italic;
                margin-bottom: 20px;
            }

            .map-container {
                width: 100%;
                height: 350px;
                margin-bottom: 20px;
                border-radius: 10px;
                overflow: hidden;
                border: 1px solid #fdfdfd;
            }

            .form-container {
                margin-top: 20px;
                display: flex;
                flex-direction: column;
                align-items: center;
            }

            .form-container input, .form-container textarea {
                padding: 10px;
                margin: 10px;
                width: calc(100% - 40px);
                max-width: 600px;
                border: 1px solid #ddd;
                border-radius: 5px;
                font-size: 1em;
            }

            .form-container button {
                padding: 10px 20px;
                margin-top: 10px;
                background-color: #28a745;
                color: #fff;
                border: none;
                border-radius: 5px;
                font-size: 1em;
                cursor: pointer;
                transition: background-color 0.3s;
            }

            .form-container button:hover {
                background-color: #218838;
            }

            .form-container .btn-geocode {
                background-color: #007bff;
            }

            .form-container .btn-geocode:hover {
                background-color: #0056b3;
            }

            .form-container .btn-current-location {
                background-color: #ffc107;
                color: #333;
            }

            .form-container .btn-current-location:hover {
                background-color: #e0a800;
            }
        </style>

        <div class="container">
            <h1>Register Your Recycling Organization</h1>
            <h5>Enter your details and set your location</h5>
            <div id="map" class="map-container"></div>
            <div class="form-container">
                <form method="POST" action="{{ route('recycling_organizations.store') }}">
                    @csrf
                    <input type="text" name="name" placeholder="Organization Name" required>
                    <input type="email" name="email" placeholder="Email Address" required> <!-- New email input -->
                    <textarea name="description" placeholder="Description" required></textarea>
                    <textarea name="requirements" placeholder="Requirements" required></textarea>
                    <input type="text" id="address" placeholder="Enter address to geocode">
                    <button type="button" class="btn-geocode" onclick="geocodeAddress()">Geocode Address</button>
                    <input type="text" id="latitude" name="latitude" placeholder="Latitude" required readonly>
                    <input type="text" id="longitude" name="longitude" placeholder="Longitude" required readonly>
                    <button type="button" class="btn-current-location" onclick="getCurrentLocation()">Use My Current Location</button>
                    <button type="submit">Register</button>
                </form>
            </div>
        </div>
    </main>

    <script>
        var map = L.map('map').setView([51.505, -0.09], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        let marker;

        map.on('click', function(e) {
            const lat = e.latlng.lat;
            const lng = e.latlng.lng;

            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker([lat, lng]).addTo(map);

            document.getElementById('latitude').value = lat;
            document.getElementDById('longitude').value = lng;
        });

        function getCurrentLocation() {
            navigator.geolocation.getCurrentPosition(function(pos) {
                const lat = pos.coords.latitude;
                const lng = pos.coords.longitude;

                if (marker) {
                    map.removeLayer(marker);
                }
                marker = L.marker([lat, lng]).addTo(map);
                map.setView([lat, lng], 13);

                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;
            }, function(err) {
                alert("Error: " + err.message);
            });
        }

        function geocodeAddress() {
            const address = document.getElementById('address').value;

            fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(address)}`)
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    const lat = data[0].lat;
                    const lng = data[0].lon;

                    if (marker) {
                        map.removeLayer(marker);
                    }
                    marker = L.marker([lat, lng]).addTo(map);
                    map.setView([lat, lng], 13);

                    document.getElementById('latitude').value = lat;
                    document.getElementById('longitude').value = lng;
                } else {
                    alert("Address not found");
                }
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</x-RecycleLayout>
