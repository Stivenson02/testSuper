<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Inventory;

class Product extends Model
{
    public function inventory() {
        return $this->hasOne(Inventory::class, 'product_id', 'id');
    }

    public function logLote() {
        return $this->hasOne(LogLoteProduct::class, 'product_id', 'id');
    }
}
