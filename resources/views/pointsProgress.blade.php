<x-plasticUserLayout>
    <main>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <style>
            body {
                padding-top: 70px; /* Adjust this value based on your navigation bar height */
            }

            .content-wrapper {
                margin-top: 70px; /* Adjust this value based on your navigation bar height */
                padding: 15px;
            }

            .table-responsive {
                overflow-x: auto;
            }

            .table th {
                font-weight: bold;
                background-color: #2dc997;
                color: white;
                text-align: center;
            }

            .table td {
                text-align: center;
            }

            .note {
                font-weight: bold;
                color: #2dc997;
                margin-top: 10px;
                text-align: center;
            }

            .disclaimer {
                font-style: italic;
                margin-top: 5px;
                text-align: center;
                color: #2dc997;
            }
        </style>

        <section id="progress_points">
            <div class="content-wrapper">
                <div class="container mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h3>Points Progress</h3>
                        </div>
                        <div class="card-body">
                            @if(Auth::check() && isset($points))
                                <p class="lead">Hello, {{ Auth::user()->name }}!</p>
                                <p class="lead">You have accumulated <strong>{{ $points }}</strong> points so far.</p>
                            @else
                                <p class="lead">Points information unavailable.</p>
                            @endif
                        </div>
                        <div class="card-footer">
                            <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>

                <br><br><br>

                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Green Points Redemption Chart</h4>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>KG's</th>
                                                <th>Points</th>
                                                <th>Kenya Shillings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>1</td>
                                                <td>15</td>
                                                <td>15</td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>100</td>
                                                <td>100</td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>200</td>
                                                <td>200</td>
                                            </tr>
                                            <tr>
                                                <td>15</td>
                                                <td>300</td>
                                                <td>300</td>
                                            </tr>
                                            <tr>
                                                <td>20</td>
                                                <td>400</td>
                                                <td>400</td>
                                            </tr>
                                            <tr>
                                                <td>25</td>
                                                <td>500</td>
                                                <td>500</td>
                                            </tr>
                                            <tr>
                                                <td>30</td>
                                                <td>600</td>
                                                <td>600</td>
                                            </tr>
                                            <tr>
                                                <td>35</td>
                                                <td>700</td>
                                                <td>700</td>
                                            </tr>
                                            <tr>
                                                <td>40</td>
                                                <td>800</td>
                                                <td>800</td>
                                            </tr>
                                            <tr>
                                                <td>45</td>
                                                <td>900</td>
                                                <td>900</td>
                                            </tr>
                                            <tr>
                                                <td>50</td>
                                                <td>1000</td>
                                                <td>1000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <p class="note">Note that the prices and values are subject to change.</p>
                                    <p class="note">Email us for points redemption</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </main>
</x-plasticUserLayout>
