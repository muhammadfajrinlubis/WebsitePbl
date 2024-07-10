<?php

namespace App\Http\Controllers;

use App\Models\SensorData;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SensorDataController extends Controller
{
    // Method to display the form with the latest sensor data
    public function index()
    {
        // Retrieve the latest sensor data
        $SensorData = SensorData::latest()->first();

        // Pass the latest sensor data to the view
        return view('measurements.create', [
            'berat' => $SensorData->berat,
            'tinggi' => $SensorData->tinggi,
        ]);
    }

    // Method to store new sensor data
    public function store(Request $request)
    {
        $request->validate([
            'berat' => 'required|string',
            'tinggi' => 'required|string',
        ]);

        preg_match('/Berat:(\d+(\.\d+)?)kg/', $request->berat, $beratMatches);
        preg_match('/Tinggi:(\d+(\.\d+)?)ft/', $request->tinggi, $tinggiMatches);

        if (!$beratMatches || !$tinggiMatches) {
            return response()->json(['error' => 'Invalid input format'], 400);
        }

        $berat = (float) $beratMatches[1];
        $tinggi = (float) $tinggiMatches[1];

        $sensorData = new SensorData();
        $sensorData->berat = $berat;
        $sensorData->tinggi = $tinggi;
        $sensorData->save();

        return response()->json(['message' => 'Data berhasil disimpan'], 201);
    }
}
