<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reportSample extends Model
{
    use HasFactory;
    protected $table = 'report_sample';

    public $timestamps = false;

    protected $fillable = [
        'id_reportsample',
        'notes_reportsample',
        'no_so_solab'
    ];

    
}
