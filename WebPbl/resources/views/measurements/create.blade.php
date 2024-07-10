@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pengukuran Baru untuk {{ $user->name }}</h2>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <form action="{{ route('measurements.store', $user->id) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tinggi">Tinggi Badan (cm):</label>
            <input type="number" name="tinggi" id="tinggi" class="form-control" value="{{ old('tinggi', isset($measurement) ? $measurement->tinggi : '') }}" required>
        </div>
        <div class="form-group">
            <label for="berat">Berat Badan (kg):</label>
            <input type="number" name="berat" id="berat" class="form-control" value="{{ old('berat', isset($measurement) ? $measurement->berat : '') }}" required>
        </div>
        @if(isset($latestSensorData))
        <div class="form-group">
            <label for="id_sensor_data">ID Sensor Data:</label>
            <input type="text" name="id_sensor_data" id="id_sensor_data" class="form-control" value="{{ $latestSensorData->id }}" readonly>
        </div>
        @endif
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>

<style>
    .container {
        max-width: 600px;
        margin-top: 50px;
    }
    h2 {
        text-align: center;
        margin-bottom: 30px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .btn-primary {
        display: block;
        width: 100%;
    }
</style>
@endsection
