<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Report extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'reports';
    protected $fillable = [
        'tieu_de_report',
        'noi_dung_report',
        'user_id',
        'email',
        'name'
    ];
}
