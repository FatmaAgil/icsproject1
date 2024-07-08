<!-- resources/views/landingUser.blade.php -->

<x-plasticUserLayout>
    <!-- Include Leaflet CSS -->
    <link rel="stylesheet" href="{{ asset('leaflet/dist/leaflet.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
     integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
     crossorigin=""/>
     <!-- Make sure you put this AFTER Leaflet's CSS -->
     <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
      integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
      crossorigin=""></script>
    <br><br><br><br><br>
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
                height: 100vh;
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
            }

            h5 {
                font-size: 1.5em;
                color: #333;
                font-weight: italic;
            }

            .map-container {
                width: 100%;
                height: 350px;
                margin-top: 20px;
            }
        </style>

        <div class="container">
            <h1>Welcome to RecycleConnect</h1>
            <h5>Get connected to plastic recyclers near you</h5><br><br>
            <div id="map" class="map-container"></div>

        </div>
    </main>

<script>
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
    marker =  L.marker([lat, lng]).addTo(map);
    circle =  L.circle([lat, lng], {radius: accuracy}).addTo(map);

    if (!zoomed) {
      zoomed = map.fitBounds(circle.getBounds());
    }

    map.setView([lat, lng]);

}

function error(err) {

    if (err.code === 1) {
        alert("Please allow geolocation access");
    } else {
        alert("Cannot get current location");
    }
}
</script>

</x-plasticUserLayout>
