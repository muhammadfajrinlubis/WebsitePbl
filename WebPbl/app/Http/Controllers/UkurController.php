<?php

namespace App\Http\Controllers;

use App\Models\Measurement;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class UkurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function list(Request $request)
    {
        // Search functionality
        $query = Measurement::query();

        if ($request->has('name')) {
            // Menggunakan join dengan tabel User jika ada relasi
            $query->whereHas('user', function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->get('name') . '%');
            });
        }

        $getRecord = $query->with('user')->paginate(10);

        return view('admin.hasil.list', compact('getRecord'));
    }
}
