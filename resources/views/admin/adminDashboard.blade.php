@extends('layouts.admin')
@section('title','dashboard')
@section('content-header','Dashboard')
@section('content-action')
@endsection
@section('content')

  <div class="d-xl-flex justify-content-between align-items-start">

    <h2 class="text-dark font-weight-bold mb-2"> RecycleConnect dashboard </h2>
    <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">
        <div class="btn-group bg-white p-3" role="group" aria-label="Basic example" style="display: inline-block; padding: 1rem; background-color: #ffffff;">
            <button type="button" class="btn btn-link text-dark py-0 border-right" onclick="setDateRange(7)" style="border: 1px solid #dee2e6; padding: 0.5rem 1rem; border-right: 0; color: #000000; text-decoration: none;">7 Days</button>
            <button type="button" class="btn btn-link text-dark py-0 border-right" onclick="setDateRange(30)" style="border: 1px solid #dee2e6; padding: 0.5rem 1rem; border-right: 0; color: #000000; text-decoration: none;">1 Month</button>
            <button type="button" class="btn btn-link text-dark py-0" onclick="setDateRange(90)" style="border: 1px solid #dee2e6; padding: 0.5rem 1rem; color: #000000; text-decoration: none;">3 Months</button>
        </div>
        <div class="dropdown ml-0 ml-md-4 mt-2 mt-lg-0" style="margin-left: 1rem; margin-top: 0.5rem;">
            <button class="btn bg-white dropdown-toggle p-3 d-flex align-items-center" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="background-color: #ffffff; padding: 1rem; display: flex; align-items: center;">
                <i class="mdi mdi-calendar mr-1" style="font-family: 'Material Design Icons'; font-style: normal; font-weight: normal; font-size: inherit; text-rendering: auto; line-height: 1; margin-right: 0.25rem;"></i><span id="date-range"></span>
            </button>
        </div>
      </div>

    <h2 class="text-dark font-weight-bold mb-2"> Analytics </h2>
    <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">

    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="d-sm-flex justify-content-between align-items-center transaparent-tab-border {">
        <ul class="nav nav-tabs tab-transparent" role="tablist">
          <li class="nav-item">
            <a class="nav-link" id="home-tab" data-toggle="tab" href="#" role="tab" aria-selected="true">Users</a>
          </li>
          <li class="nav-item">

            <a class="nav-link" id="home-tab" data-toggle="tab" href="#" role="tab" aria-selected="true">Recyling </a>
          </li>

            <a class="nav-link active" id="business-tab" data-toggle="tab" href="#business-1" role="tab" aria-selected="false">Business</a>
          </li>


        </ul>
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Doughnut chart</h4>
                <canvas id="doughnutChart" style="height:250px"></canvas>
              </div>
            </div>
          </div>
        <div class="d-md-block d-none">
          <a href="#" class="text-light p-1"><i class="mdi mdi-view-dashboard"></i></a>
          <a href="#" class="text-light p-1"><i class="mdi mdi-dots-vertical"></i></a>
        </div>
      </div>
      <div class="tab-content tab-transparent-content">
        <div class="tab-pane fade show active" id="business-1" role="tabpanel" aria-labelledby="business-tab">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Plastic Users</h5>
                            <h2 class="mb-4 text-dark font-weight-bold" id="plastic-users-count">0</h2>
                            <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-account icon-md absolute-center text-dark"></i></div>
                            <p class="mt-4 mb-0">Total Plastic Users</p>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark" id="total-plastic-users">0</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body text-center">
                            <h5 class="mb-2 text-dark font-weight-normal">Recyclers</h5>
                            <h2 class="mb-4 text-dark font-weight-bold" id="recyclers-count">0</h2>
                            <div class="dashboard-progress dashboard-progress-1 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-recycle icon-md absolute-center text-dark"></i></div>
                            <p class="mt-4 mb-0">Total Recyclers</p>
                            <h3 class="mb-0 font-weight-bold mt-2 text-dark" id="total-recyclers">0</h3>
                        </div>
                    </div>
                </div>

            <div class="col-xl-3  col-lg-6 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="mb-2 text-dark font-weight-normal">Impressions</h5>
                  <h2 class="mb-4 text-dark font-weight-bold">100,38</h2>
                  <div class="dashboard-progress dashboard-progress-3 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-eye icon-md absolute-center text-dark"></i></div>
                  <p class="mt-4 mb-0">Increased since yesterday</p>
                  <h3 class="mb-0 font-weight-bold mt-2 text-dark">35%</h3>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6 col-sm-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body text-center">
                  <h5 class="mb-2 text-dark font-weight-normal">Followers</h5>
                  <h2 class="mb-4 text-dark font-weight-bold">4250k</h2>
                  <div class="dashboard-progress dashboard-progress-4 d-flex align-items-center justify-content-center item-parent"><i class="mdi mdi-cube icon-md absolute-center text-dark"></i></div>
                  <p class="mt-4 mb-0">Decreased since yesterday</p>
                  <h3 class="mb-0 font-weight-bold mt-2 text-dark">25%</h3>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-12 grid-margin">
              <div class="card">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <h4 class="card-title mb-0">Recent Activity</h4>
                        <div class="dropdown dropdown-arrow-none">
                          <button class="btn p-0 text-dark dropdown-toggle" type="button" id="dropdownMenuIconButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="mdi mdi-dots-vertical"></i>
                          </button>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuIconButton1">
                            <h6 class="dropdown-header">Settings</h6>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-lg-3 col-sm-4 grid-margin  grid-margin-lg-0">
                      <div class="wrapper pb-5 border-bottom">
                        <div class="text-wrapper d-flex align-items-center justify-content-between mb-2">
                          <p class="mb-0 text-dark">Total Profit</p>
                          <span class="text-success"><i class="mdi mdi-arrow-up"></i>2.95%</span>
                        </div>
                        <h3 class="mb-0 text-dark font-weight-bold">$ 92556</h3>
                        <canvas id="total-profit"></canvas>
                      </div>
                      <div class="wrapper pt-5">
                        <div class="text-wrapper d-flex align-items-center justify-content-between mb-2">
                          <p class="mb-0 text-dark">Expenses</p>
                          <span class="text-success"><i class="mdi mdi-arrow-up"></i>52.95%</span>
                        </div>
                        <h3 class="mb-4 text-dark font-weight-bold">$ 59565</h3>
                        <canvas id="total-expences"></canvas>
                      </div>
                    </div>
                    <div class="col-lg-9 col-sm-8 grid-margin  grid-margin-lg-0">
                      <div class="pl-0 pl-lg-4 ">
                        <div class="d-xl-flex justify-content-between align-items-center mb-2">
                          <div class="d-lg-flex align-items-center mb-lg-2 mb-xl-0">
                            <h3 class="text-dark font-weight-bold mr-2 mb-0">Devices sales</h3>
                            <h5 class="mb-0">( growth 62% )</h5>
                          </div>
                          <div class="d-lg-flex">
                            <p class="mr-2 mb-0">Timezone:</p>
                            <p class="text-dark font-weight-bold mb-0">GMT-0400 Eastern Delight Time</p>
                          </div>
                        </div>
                        <div class="graph-custom-legend clearfix" id="device-sales-legend"></div>
                        <canvas id="device-sales"></canvas>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-4 grid-margin stretch-card">
              <div class="card card-danger-gradient">

                <div class="card-body bg-white pt-4">
                  <div class="row pt-4">
                    <div class="col-sm-6">
                      <div class="text-center border-right border-md-0">
                        <h4>Conversion</h4>
                        <h1 class="text-dark font-weight-bold mb-md-3">$306</h1>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="text-center">
                        <h4>Cancellation</h4>
                        <h1 class="text-dark font-weight-bold">$1,520</h1>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-sm-8  grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="d-xl-flex justify-content-between mb-2">
                    <h4 class="card-title">Page views analytics</h4>
                    <div class="graph-custom-legend primary-dot" id="pageViewAnalyticLengend"></div>
                  </div>
                  <canvas id="page-view-analytic"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
        function formatDate(date) {
            const options = { year: 'numeric', month: 'short', day: 'numeric' };
            return date.toLocaleDateString(undefined, options);
        }

        function setDateRange(days) {
            const today = new Date();
            const startDate = new Date(today.getFullYear(), today.getMonth(), today.getDate() - days);
            const endDate = today;

            const dateRangeElement = document.getElementById('date-range');
            dateRangeElement.textContent = `${formatDate(startDate)} - ${formatDate(endDate)}`;
        }

        document.addEventListener('DOMContentLoaded', () => setDateRange(30)); // Default to 1 Month
        const plasticUsersCount = 1234; // Example count for plastic users
    const recyclersCount = 567; // Example count for recyclers

    // Update the dashboard with the actual counts
    document.getElementById('plastic-users-count').textContent = plasticUsersCount;
    document.getElementById('total-plastic-users').textContent = plasticUsersCount;

    document.getElementById('recyclers-count').textContent = recyclersCount;
    document.getElementById('total-recyclers').textContent = recyclersCount;

    // Data for the charts
    const plasticUsersData = [120, 150, 300, 500, 750, 900, plasticUsersCount]; // Replace with actual data
    const recyclersData = [80, 100, 200, 350, 400, 450, recyclersCount]; // Replace with actual data

    // Create Plastic Users Chart
    const ctxPlasticUsers = document.getElementById('plasticUsersChart').getContext('2d');
    const plasticUsersChart = new Chart(ctxPlasticUsers, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'], // Example labels
            datasets: [{
                label: 'Plastic Users',
                data: plasticUsersData,
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });

    // Create Recyclers Chart
    const ctxRecyclers = document.getElementById('recyclersChart').getContext('2d');
    const recyclersChart = new Chart(ctxRecyclers, {
        type: 'line',
        data: {
            labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'], // Example labels
            datasets: [{
                label: 'Recyclers',
                data: recyclersData,
                borderColor: 'rgba(153, 102, 255, 1)',
                borderWidth: 2,
                fill: false
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    beginAtZero: true
                },
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>

@endsection
<script src="../../assets/js/chart.js"></script>
