<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\QueryScopes;

class Language extends Model
{
    use HasFactory, SoftDeletes,QueryScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'canonical',
        'publish',
        'user_id',
        'image',
    ];

    protected $table = 'languages';

    public function languages(){
        return $this->belongsToMany(
        PostCatalogue::class,
            'post_catalogue_language',
            'post_catalogue_id',
            'language_id'
        )
        ->withPivot(
            'name',
            'canonical',
            'meta_title',
            'meta_keyword',
            'meta_description',
            'description',
            'content'
        )->withTimestamps();
    }
}
