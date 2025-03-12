<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangModel extends Model
{
    protected $table = 'm_barang';

    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }
}