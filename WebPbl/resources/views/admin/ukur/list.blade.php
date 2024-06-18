@extends('layouts.app')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add New Anak</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>



    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Growth Chart</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <div style="width: 75%; margin: auto;">
        <canvas id="growthChart"></canvas>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var ctx = document.getElementById('growthChart').getContext('2d');
            var growthChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: @json($data['labels']),
                    datasets: [{
                        label: 'Optimal Growth (cm)',
                        data: @json($data['growthLines']['optimal']),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 2,
                        fill: false
                    }, {
                        label: 'Average Growth (cm)',
                        data: @json($data['growthLines']['average']),
                        borderColor: 'rgba(153, 102, 255, 1)',
                        borderWidth: 2,
                        fill: false
                    }, {
                        label: 'Below Average Growth (cm)',
                        data: @json($data['growthLines']['belowAverage']),
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 2,
                        fill: false
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Age (Years)'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Height (cm)'
                            }
                        }
                    },
                    plugins: {
                        title: {
                            display: true,
                            text: 'Child Growth Chart'
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>













@endsection
