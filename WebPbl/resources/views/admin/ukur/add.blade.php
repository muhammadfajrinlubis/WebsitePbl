@extends('layouts.app')

@section('content')
<head>
    <title>Tambah Pengukuran</title>
</head>
<body>
    <h1>Tambah Pengukuran untuk {{ $user->name }}</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('measurements.store', $user->id) }}" method="POST">
        @csrf
        <div>
            <label for="height">Tinggi Badan:</label>
            <input type="text" id="height" name="height" required>
        </div>
        <div>
            <label for="weight">Berat Badan:</label>
            <input type="text" id="weight" name="weight" required>
        </div>
        <button type="submit">Tambah Pengukuran</button>
    </form>
</body>
@endsection
