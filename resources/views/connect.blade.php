<x-plasticUserLayout><br><br><br><br><br>
    <!-- Include Leaflet CSS and JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
          integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
            integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

    <main>
        <style>
            .container {
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(59, 110, 77, 0.809);
            }
            .form-group {
                margin-bottom: 20px;
            }
            .form-group label {
                display: block;
                margin-bottom: 5px;
                font-weight: bold;
            }
            .form-group input,
            .form-group select,
            .form-group textarea {
                width: 100%;
                padding: 10px;
                border: 1px solid #2dc997;
                border-radius: 4px;
            }
            .form-group button {
                display: inline-block;
                padding: 10px 20px;
                background-color: #2dc997;
                color: #fff;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }
            .form-group button:hover {
                background-color: #16bc0a;
            }
            .map-container {
                width: 100%;
                height: 350px;
                margin-top: 20px;
                border-radius: 20px;
            }
            .card-container {
                display: flex;
                flex-wrap: wrap;
                justify-content: center;
                margin-top: 20px;
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
            .no-org-message {
                color: #ff0000;
                font-weight: bold;
                margin-top: 20px;
            }
        </style>

        <section id="plasticLanding">
            <div class="container" data-aos="fade-up">
                <form id="plasticForm">
                    @csrf

                    <h3>Fill in Plastic Details</h3>
                    <div class="form-group">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" placeholder="Enter your official name" required>
                    </div>
                    <div class="form-group">
                        <label for="phoneNumber">Phone Number:</label>
                        <input type="text" id="phoneNumber" name="phone_number" placeholder="Enter your phone number" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="plastic-type">Type of Plastic:</label>
                        <select id="plastic-type" name="plastic_type" required>
                            <option value="" disabled selected>Select type of plastic</option>
                            <option value="PET">PET (Polyethylene Terephthalate)</option>
                            <option value="HDPE">HDPE (High-Density Polyethylene)</option>
                            <option value="PVC">PVC (Polyvinyl Chloride)</option>
                            <option value="LDPE">LDPE (Low-Density Polyethylene)</option>
                            <option value="PP">PP (Polypropylene)</option>
                            <option value="PS">PS (Polystyrene)</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Quantity of Plastic (kg):</label>
                        <input type="number" id="quantity" name="quantity" placeholder="Enter quantity in kilograms" required>
                    </div>
                    <div class="form-group">
                        <label for="condition">Condition of Plastic:</label>
                        <select id="condition" name="condition" required>
                            <option value="" disabled selected>Select condition</option>
                            <option value="Clean">Clean</option>
                            <option value="Mixed">Mixed with other materials</option>
                            <option value="Contaminated">Contaminated</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="collection-date">Preferred Collection Date:</label>
                        <input type="date" id="collection-date" name="collection_date" required>
                    </div>
                    <div class="form-group">
                        <label for="collection-time">Preferred Collection Time:</label>
                        <input type="time" id="collection-time" name="collection_time" required>
                    </div>
                    <div class="form-group">
                        <label for="instructions">Special Instructions:</label>
                        <textarea id="instructions" name="instructions" rows="4" placeholder="Any special instructions"></textarea>
                    </div>

                
                    <h3>Additional Information</h3>
                    <div class="form-group">
                        <label for="comments">Comments:</label>
                        <textarea id="comments" name="comments" rows="4" placeholder="Any additional comments"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="checkbox" id="terms" name="terms" required>
                        <label for="terms">I agree to the <a href="/terms">terms and conditions</a>.</label>
                    </div>
                </form>
            </div>
        </section>

        <section id="connectMap">
            <div class="container">
                <h1>Welcome to RecycleConnect</h1>
                <h5>Get connected to plastic recyclers near you</h5><br><br>
                <div id="map" class="map-container"></div>
                <div id="card-container" class="card-container"></div>
                <div id="no-org-message" class="no-org-message" style="display: none;">
                    No recycling organizations found around your location.
                </div>
            </div>
        </section>
        <script>
            // Define custom icon for recycling organizations
            var recyclingIcon = L.icon({
                iconUrl: 'https://icon-icons.com/icon/eco-ecology-ecological-environment-pollution-nature-leaf-recycle/122073',
                iconSize: [32, 32],
                iconAnchor: [16, 32],
                popupAnchor: [0, -32]
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
                        cardContainer.innerHTML = '';

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
                const plasticUserName = document.getElementById('name').value;
                const plasticUserPhone = document.getElementById('phoneNumber').value;
                const plasticUserEmail = document.getElementById('email').value;
                const plasticType = document.getElementById('plastic-type').value;
                const quantity = document.getElementById('quantity').value;
                const condition = document.getElementById('condition').value;
                const collectionDate = document.getElementById('collection-date').value;
                const collectionTime = document.getElementById('collection-time').value;
                const instructions = document.getElementById('instructions').value;
                const paymentMethod = document.getElementById('payment-method').value;
                const bankDetails = document.getElementById('bank-details-input').value;
                const comments = document.getElementById('comments').value;
                fetch(`/connect/${name}`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: JSON.stringify({
                        name: plasticUserName,
                        phone: plasticUserPhone,
                        email: plasticUserEmail,
                        plastic_type: plasticType,
                        quantity: quantity,
                        condition: condition,
                        collection_date: collectionDate,
                        collection_time: collectionTime,
                        instructions: instructions,
                        payment_method: paymentMethod,
                        bank_details: bankDetails,
                        comments: comments
                    })
                })
                .then(response => response.json())
                .then(data => {
                    alert(`You have connected to ${name}. Email: ${data.email}`);
                })
                .catch(error => console.error('Error connecting to organization:', error));
            }
        </script>
         @include('components.script')
</x-plasticUserLayout>
