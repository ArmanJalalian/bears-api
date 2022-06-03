<?php

namespace App\Models\V1;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Bagusindrayana\LaravelCoordinate\Traits\LaravelCoordinate;

class Bear extends Model
{
    use HasFactory;
    use LaravelCoordinate;

    protected $fillable = ['name', 'city', 'province', 'latitude', 'longitude'];

    public $_latitudeName = "latitude";
    public $_longitudeName = "longitude";
    public $timestamps = false;
}
