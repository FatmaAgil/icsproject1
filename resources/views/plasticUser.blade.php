<x-plasticUserLayout><br>
    <main>
        <style>

             .container {
                 max-width: 800px;
                 margin: 0 auto;
                 padding: 20px;

                 border-radius: 8px;
                 box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
             }
             .section-header {
                 text-align: center;
                 margin-bottom: 40px;
             }
             .section-title {
                 font-size: 24px;
                 font-weight: bold;
             }
             .section-description {
                 font-size: 16px;
                 color: #777;
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
                 border: 1px solid #ccc;
                 border-radius: 4px;
             }
             .input-icon {
    position: relative;
    display: inline-block;
    width: 100%;
}

.input-icon input {
    width: 100%;
    padding-right: 2.5rem; /* Adjust padding to make room for the icon */
}

.input-icon i {
    position: absolute;
    right: 10px;
    top: 50%;
    transform: translateY(-50%);
    color: green;
    pointer-events: none;
}

             .form-group button {
                 display: inline-block;
                 padding: 10px 20px;
                 background-color: #007bff;
                 color: #fff;
                 border: none;
                 border-radius: 4px;
                 cursor: pointer;
             }
             .form-group button:hover {
                 background-color: #0056b3;
             }
         </style>

        <section id="plasticLanding">
            <section id="events">
                <div class="container" data-aos="fade-up">

                  <div class="container">
                    <form action="#" method="POST">


                        <h3>Fill in plastic Details</h3>
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
                            <label for="dropoff-location">Preferred Drop-off Location:</label>
                            <div class="input-icon">
                                <input type="text" id="dropoff-location" name="dropoff_location" placeholder="Enter drop-off location">
                                <i class="bi bi-geo-fill"></i>
                            </div>
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
                            <label for="bank-details">Bank Account Details:</label>
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
    </main>
@include('components.plasticUserScript')
  @include('components.script')
</x-plasticUserLayout>

