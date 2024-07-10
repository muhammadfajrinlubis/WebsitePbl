@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Grafik Stunting {{ $user->name }}</h1>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <canvas id="heightChart"></canvas>
                            <canvas id="weightChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    var ctxHeight = document.getElementById('heightChart').getContext('2d');
    var ctxWeight = document.getElementById('weightChart').getContext('2d');

    var heightData = @json($tinggiData);
    var weightData = @json($beratData);
    var whoHeightData = @json($whoHeightData);
    var whoWeightData = @json($whoWeightData);


    new Chart(ctxHeight, {
        type: 'line',
        data: {
            labels: heightData.map(data => data.age),
            datasets: [
                {
                    label: 'Tinggi Badan (cm)',
                    data: heightData.map(data => data.height),
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                },
                {
                    label: 'Kurva Standar WHO',
                    data: whoHeightData.map(data => data[1]),
                    borderColor: 'rgb(255, 99, 132)',
                    borderDash: [5, 5],
                    tension: 0.1
                }
            ]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Umur (Bulan)'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Tinggi Badan (cm)'
                    }
                }
            }
        }
    });

    new Chart(ctxWeight, {
        type: 'line',
        data: {
            labels: weightData.map(data => data.age),
            datasets: [
                {
                    label: 'Berat Badan (kg)',
                    data: weightData.map(data => data.weight),
                    borderColor: 'rgb(75, 192, 192)',
                    tension: 0.1
                },
                {
                    label: 'Kurva Standar WHO',
                    data: whoWeightData.map(data => data[1]),
                    borderColor: 'rgb(255, 99, 132)',
                    borderDash: [5, 5],
                    tension: 0.1
                }
            ]
        },
        options: {
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Umur (Bulan)'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Berat Badan (kg)'
                    }
                }
            }
        }
    });
});
</script>
@endsection
