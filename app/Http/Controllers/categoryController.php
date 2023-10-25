<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
use App\Models\sparepart;
use App\Models\stockSparepart;

class categoryController extends Controller
{
    public function getStock($id_category,$id_store){
        $spareparts = sparepart::where('id_category', $id_category)->whereHas('stock', function ($query) use ($id_store) {
                $query->where('id_store', $id_store);
            })->get();
            
        foreach ($spareparts as $item) {
            $item->id_stock = stockSparepart::where('id_sparepart',$item->codematerial_sparepart)->where('id_store',$id_store)->firstOrFail()->id_stock;
        }

        return response()->json($spareparts);
    } 

}
