<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Measurement extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'berat', 'tinggi'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
