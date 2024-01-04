<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\SoftDeletes;

class Attribute extends Model
{
    use HasFactory,
    SoftDeletes,
    QueryScopes;

    protected $fillable = [
        'name',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
