@extends('home.layout')
@section('title')
    Chart
@endsection

@section('style')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            position: relative;
            width: 100%;
            height: 400px; /* Set a flexible height */
        }

        .card {
            width: 100%; /* Ensure the card takes full width */
            transition: box-shadow 0.3s ease; /* Smooth transition for shadow effect */
        }

        .card:hover {
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.7);
        }
    </style>
@endsection

@section('mainbodycontent')
<div class="container">
    <div class="card shadow-lg" id="card">
        <div class="card-header text-center" style="background-color: white;">
            <h2 class="text-primary">Visitor Details Monthly-Wise</h2>
        </div>
        <div class="card-body">
            <div class="chart-container">
                <canvas id="myChart"></canvas>
            </div>
            <script>
                const ctx = document.getElementById('myChart');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Jan', 'Feb', 'March', 'Apr', 'May', 'June'],
                        datasets: [{
                            label: '# of Visitors',
                            data: [12, 19, 3, 5, 2, 3],
                            borderWidth: 1,
                            backgroundColor: 'rgba(75, 192, 192, 0.2)',
                            borderColor: 'rgba(75, 192, 192, 1)',
                            hoverBackgroundColor: 'rgba(75, 192, 192, 0.4)',
                            hoverBorderColor: 'rgba(75, 192, 192, 1)',
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        </div>
    </div>
</div>
@endsection
