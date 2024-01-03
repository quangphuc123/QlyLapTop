<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryScopes;
use Illuminate\Database\Eloquent\SoftDeletes;

class AttributeChildren extends Model
{
    use
    HasFactory,
    SoftDeletes,
    QueryScopes;

    protected $table = 'attribute_chilren';

    protected $fillable = [
        'name',
        'description',
        'price',
        'attribute_id',
    ];
}
