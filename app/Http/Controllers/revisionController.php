<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;

class revisionController extends Controller
{
    public function update($id_order, Request $request){
        $validated = $request->validate([
            'no-do-memo'=>'required',
        ]);
        $revisi = order::where('id_order',$id_order)->firstOrFail()->revisi;
        if($revisi->order->do_order){
            $revisi->do_order = $validated['no-do-memo'];
            $revisi->status = TRUE;
            $revisi->order->status = 'closed';
            $revisi->order->save();
        }
        elseif($revisi->order->memo_order){
            $revisi->memo_order = $validated['no-do-memo'];
            $revisi->status = FALSE;
            $revisi->order->status = 'closed-memo-do-revisi';
            $revisi->order->save();
        }
        $revisi->save();

        return redirect('sales/sparepart/revision/'.$id_order)->with('success','no DO/MEMO DO berhasil ditambahkan');
    }
}
