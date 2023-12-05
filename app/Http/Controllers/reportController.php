<?php

namespace App\Http\Controllers;

use App\Models\formReport;
use App\Models\sample;
use Illuminate\Http\Request;

class reportController extends Controller
{
    public function storeSample($id_solab, $id_sample, Request $request)
    {
        $sample = sample::where('id_sample', $id_sample)->firstOrFail();
        $field = json_decode($sample->formReport->field_formreport, true);
        $required = [];
        foreach ($field as $key => $value) {
            if ($value != -1) $required[str_replace(' ', '_', $key)] = 'required';
        }
        $form = $sample->formReport;
        $validated = ($request->validate($required));
        foreach ($validated as $key => $value) {
            $field[str_replace('_', ' ', $key)] = $value;
        }
        $form->field_formreport = json_encode([$field]);
        $form->save();
        $sample->status_sample = TRUE;
        $sample->save();

        $samples = sample::where('id_history',$sample->history->id_history)->get();
        $status = TRUE;
        foreach($samples as $item){
            if (!$item->status_sample) {
                $status = FALSE;
            }
        }
        if($status){
            $sample->history->finish = now();
            $sample->history->save();
        }
        return redirect('orderlist/' . $id_solab);
    }
}
