<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;

class orderController extends Controller
{
    public function update($id_order,Request $request){
        $validated =  $request->validate([
            'do-memo'=>'required',
            'no-do-memo'=>'required',
            'no-spk'=>'sometimes',
        ]);
        // 'memo_order',
        // 'do_order',
        // 'spk_order',
        $order = order::where('id_order',$id_order)->firstOrFail();
        if($validated['do-memo']==1){
            $order->spk_order = $validated['no-spk'];
            $order->do_order = $validated['no-do-memo'];
        }
        else{
            $order->memo_order = $validated['no-do-memo'];
        };
        $order->save();

        return redirect()->back()->with('success','DO/MEMO DO berhasil di simpan');
    }
}
