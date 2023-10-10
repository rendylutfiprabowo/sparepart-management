<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Models\sales;
use App\Models\sample;
use App\Models\solab;
use App\Models\project;

class solabController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            "no_so_solab" => "required",
            "no_spk_solab" => "required",
            "id_customer" => "required",
            "nama_project" => "required",
            "id_sales" => "required",
            "tahun_solab" => "required",
            "alamat_project" => "required",
            "dga_qty" => "required",
            "furan_qty" => "required",
            "oa_qty" => "required",
        ]);
        if (!(Project::where('id_customer', $validated['id_customer'])
            ->where('nama_project', $validated['nama_project'])
            ->exists())) {

            $project = new project();
            $project->id_project = 'aasdaeq3';
            $project->id_customer = $validated['id_customer'];
            $project->nama_project = $validated['nama_project'];
            $project->alamat_project = $validated['alamat_project'];
            $project->save();
        }
        $project = Project::all()
            ->where('id_customer', $validated['id_customer'])
            ->where('nama_project', $validated['nama_project'])
            ->first();

        $solab = new solab();
        $solab->id_project = $project->id_project;
        $solab->id_sales = $validated['id_sales'];
        $solab->no_so_solab = $validated['no_so_solab'];
        $solab->no_spk_solab = $validated['no_spk_solab'];
        $solab->tahun_solab = $validated['tahun_solab'];
        $solab->alamat_solab = $validated['alamat_project'];
        $solab->save();

        $dga = new sample();
        $dga->id_sample = '12333';
        $dga->jumlah_sample = $validated['dga_qty'];
        $dga->status_sample = $validated['dga_qty'];
        $dga->id_solab = '12';
        $dga->id_scope = '2';
        $dga->save();

        $furan = new sample();
        $furan->id_sample = '12333';
        $furan->jumlah_sample = $validated['furan_qty'];
        $furan->status_sample = $validated['furan_qty'];
        $furan->id_solab = '12';
        $furan->id_scope = '2';
        $furan->save();

        $oa = new sample();
        $oa->id_sample = '12333';
        $oa->jumlah_sample = $validated['oa_qty'];
        $oa->status_sample = $validated['oa_qty'];
        $oa->id_solab = '12';
        $oa->id_scope = '2';
        $oa->save();
    }
}
