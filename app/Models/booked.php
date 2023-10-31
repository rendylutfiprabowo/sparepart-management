<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class booked extends Model
{
    use HasFactory;
    protected $table = 'booked';

    public $timestamps = false;


    protected $fillable = [
        'id_booked',
        'id_stock',
        'id_revisi',
        'qty_booked',
        'id_order'
    ];

    public function stock(): BelongsTo
    {
        return $this->BelongsTo(stockSparepart::class, 'id_stock', 'id_stock');
    }
    public function order(): BelongsTo
    {
        return $this->BelongsTo(order::class, 'id_order', 'id_order');
    }
    public function revisi(): BelongsTo
    {
        return $this->BelongsTo(order::class, 'id_revisi', 'id_revisi');
    }

    public function vice(){
        if ($this->id_order){
            if($this->order->revisi){
                return ($this->order->revisi->booked->where('id_stock',$this->id_stock)->first());
            }
        }
        else if($this->id_revisi){
            if($this->revisi->order){
                return ($this->order->revisi->booked->where('id_stock',$this->id_stock)->first());
            }
        }
        else return null;
    }
}
