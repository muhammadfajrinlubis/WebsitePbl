<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\SensorData;
use App\Models\Measurement;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class MeasurementController extends Controller
{
    public function create($userId)
    {
        $user = User::findOrFail($userId);

        // Ambil data sensor terbaru
        $latestSensorData = SensorData::latest()->first();

        // Inisialisasi $measurement dengan data terbaru jika ada, jika tidak, kosong
        $measurement = new Measurement([
            'user_id' => $user->id,
            'tinggi' => $latestSensorData->tinggi,
            'berat' => $latestSensorData->berat,
        ]);

        return view('measurements.create', compact('user', 'measurement'));
    }

    public function store(Request $request, $userId)
    {
        $request->validate([
            'tinggi' => 'required|numeric',
            'berat' => 'required|numeric',
        ]);

        $user = User::findOrFail($userId);

        $measurement = new Measurement([
            'user_id' => $user->id,
            'tinggi' => $request->input('tinggi'),
            'berat' => $request->input('berat'),
        ]);

        $measurement->save();

        return redirect('admin/hasil/list')->with('success', 'Pengukuran berhasil ditambahkan');
    }

    public function chart($userId)
    {
        $user = User::findOrFail($userId);

        // Ambil data pengukuran untuk 5 bulan ke depan
        $measurements = Measurement::where('user_id', $userId)
            ->orderBy('created_at')
            ->where('created_at', '>=', Carbon::now()->subMonths(5))
            ->get();

        // Inisialisasi array untuk data tinggi badan, berat badan, dan label
        $tinggiData = [];
        $beratData = [];
        $labels = [];

        // Loop untuk mengisi data
        foreach ($measurements as $measurement) {
            $tinggiData[] = $measurement->tinggi;
            $beratData[] = $measurement->berat;
            $labels[] = Carbon::parse($measurement->created_at)->format('M Y');
        }

        return view('measurements.chart', compact('user', 'tinggiData', 'beratData', 'labels'));
    }



}
