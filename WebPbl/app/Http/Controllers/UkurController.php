<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UkurController extends Controller
{
    public function list(){
        $data['getRecord'] = User::getAdmin();
        $data['header_title'] = "Ukuran List";
        $data = [
            'labels' => ['0', '1', '2', '3', '4', '5'],
            'growthLines' => [
                'optimal' => [50, 75, 85, 95, 105, 115],
                'average' => [48, 72, 82, 92, 102, 112],
                'belowAverage' => [45, 70, 80, 90, 100, 110]
            ]
        ];

        return view('admin.ukur.list', compact('data'),$data);

    }
}
