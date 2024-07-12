<x-plasticUserLayout>
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
        </style>

        <section id="plasticLanding">
            <div class="container" data-aos="fade-up">
                <form action="{{ route('pl.form') }}" method="POST">
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

                    <h3>Payment Information</h3>
                    <div class="form-group">
                        <label for="payment-method">Preferred Payment Method:</label>
                        <select id="payment-method" name="payment_method" required>
                            <option value="" disabled selected>Select payment method</option>
                            <option value="bank_transfer">Bank Transfer</option>
                            <option value="cash">Cash</option>
                            <option value="MPESA">MPESA</option>
                        </select>
                    </div>
                    <div class="form-group" id="bank-details" style="display:none;">
                        <label for="bank-details-input">Bank Account Details:</label>
                        <input type="text" id="bank-details-input" name="bank_details" placeholder="Enter bank account details">
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
                    <div class="form-group">
                        <button type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </section>


        @include('components.script')

        <script>
            document.getElementById('payment-method').addEventListener('change', function () {
                var bankDetails = document.getElementById('bank-details');
                if (this.value === 'bank_transfer') {
                    bankDetails.style.display = 'block';
                } else {
                    bankDetails.style.display = 'none';
                }
            });
        </script>
    </main>
</x-plasticUserLayout>
