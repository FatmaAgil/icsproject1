@extends('layouts.admin')
@section('title','dashboard')
@section('content-header','Dashboard')
@section('content-action')
@endsection
@section('content')

  <div class="d-xl-flex justify-content-between align-items-start">

      </div>

    <h2 class="text-dark font-weight-bold mb-2"> Analytics </h2>
    <div class="d-sm-flex justify-content-xl-between align-items-center mb-2">

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
