<x-plasticUserLayout>
    <!-- Include Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <!-- Include Leaflet JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <main id="main">
        <style>
            main {
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                color: #333;
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
                min-height: 100vh;
                padding-top: 60px; /* Add padding to the top */
            }

            .container {
                text-align: center;
                padding: 20px;
                max-width: 1000px;
                margin: auto;
            }

            h1 {
                font-size: 2.5em;
                color: #333;
                font-weight: bold;
                margin-top: 0; /* Ensure no margin at the top */
            }

            h5 {
                font-size: 1.5em;
                color: #333;
                font-weight: italic;
                margin-top: 0; /* Ensure no margin at the top */
            }

            .map-container {
                width: 100%;
                height: 350px;
                margin-top: 20px;
                border-radius: 20px;
            }

            .card {
                background-color: #fff;
                padding: 20px;
                margin: 10px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                flex: 1;
                min-width: 300px;
                max-width: 300px;
                box-sizing: border-box;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
            }

            .card-container {
                width: 100%;
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                margin-top: 20px;
            }

            .card button {
                background-color: #28a745;
                color: #fff;
                border: none;
                padding: 10px;
                border-radius: 5px;
                cursor: pointer;
                align-self: center;
            }

            .no-org-message {
                color: #ff0000;
                font-weight: bold;
                margin-top: 20px;
            }
        </style>

        <div class="container">
            <h1>Welcome to RecycleConnect</h1>
            <h5>Get connected to plastic recyclers near you</h5><br><br>
            <div id="map" class="map-container"></div>
            <div id="card-container" class="card-container"></div>
            <div id="no-org-message" class="no-org-message" style="display: none;">
                No recycling organizations found around your location.
            </div>
        </div>
    </main>

    <script>
        // Define custom icon for recycling organizations
        var recyclingIcon = L.icon({
            iconUrl: 'https://www.flaticon.com/free-icon/organization_2560004?term=organization&related_id=2560004', // Replace with your custom icon path
            iconSize: [32, 32], // Size of the icon
            iconAnchor: [16, 32], // Point of the icon which will correspond to marker's location
            popupAnchor: [0, -32] // Point from which the popup should open relative to the iconAnchor
        });

        var map = L.map('map').setView([51.505, -0.09], 13);

        L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
        }).addTo(map);

        navigator.geolocation.watchPosition(success, error);

        let marker, circle, zoomed;

        function success(pos) {
            const lat = pos.coords.latitude;
            const lng = pos.coords.longitude;
            const accuracy = pos.coords.accuracy;

            if (marker) {
                map.removeLayer(marker);
                map.removeLayer(circle);
            }
            marker = L.marker([lat, lng]).addTo(map);
            circle = L.circle([lat, lng], {radius: accuracy}).addTo(map);

            if (!zoomed) {
                zoomed = map.fitBounds(circle.getBounds());
            }

            map.setView([lat, lng]);

            fetchRecyclingOrganizations(lat, lng);
        }

        function error(err) {
            if (err.code === 1) {
                alert("Please allow geolocation access");
            } else {
                alert("Cannot get current location");
            }
        }

        function fetchRecyclingOrganizations(lat, lng) {
            console.log(`Fetching recycling organizations for latitude: ${lat}, longitude: ${lng}`);
            fetch(`/api/recycling-organizations?lat=${lat}&lon=${lng}`)
                .then(response => response.json())
                .then(data => {
                    console.log('Data received:', data);
                    const cardContainer = document.getElementById('card-container');
                    const noOrgMessage = document.getElementById('no-org-message');
                    cardContainer.innerHTML = ''; // Clear existing cards

                    if (data.length === 0) {
                        noOrgMessage.style.display = 'block';
                    } else {
                        noOrgMessage.style.display = 'none';
                        data.forEach(org => {
                            const orgMarker = L.marker([org.latitude, org.longitude], { icon: recyclingIcon }).addTo(map)
                                .bindPopup(`<b>${org.name}</b><br>${org.description}`)
                                .openPopup();

                            const card = document.createElement('div');
                            card.classList.add('card');
                            card.innerHTML = `
                                <h3>${org.name}</h3>
                                <p>${org.description}</p>
                                <p><strong>Requirements:</strong> ${org.requirements}</p>
                                <button onclick="connectToOrganization('${org.name}')">Connect</button>
                            `;
                            cardContainer.appendChild(card);
                        });
                    }
                })
                .catch(error => console.error('Error fetching organizations:', error));
        }

        function connectToOrganization(name) {
            alert(`You have connected to ${name}`);
        }
    </script>

</x-plasticUserLayout>
