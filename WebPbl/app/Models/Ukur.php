<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ukur extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'alamat', 'tgl_lahir', 'gender', 'status', 'height', 'weight',
    ];

    
}
