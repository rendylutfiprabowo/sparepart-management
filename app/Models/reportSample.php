<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reportSample extends Model
{
    use HasFactory;
    protected $table = 'report_sample';

    protected $fillable = [
        'id_reportsample',
        'notes_reportsample',
        'id_solab'
    ];
}
