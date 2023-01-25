<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teams extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_name',
        'team_city',
        'team_stadium',
        'team_image',
        'division_id'
    ];
}
