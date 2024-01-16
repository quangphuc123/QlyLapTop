<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\QueryScopes;
use App\Models\Product;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, QueryScopes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    use HasFactory;
    use SoftDeletes;
    protected $table="users";
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'address',
        'province_id',
        'district_id',
        'ward_id',
        'birthday',
        'image',
        'description',
        'user_catalogue_id',
        'publish',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */


    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function user_catalogues()
    {
        return $this->belongsTo(UserCatalogue::class, 'user_catalogue_id', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'user_id', 'id');
    }

    public function hasPermission($permissionCanonical)
    {
        return $this->user_catalogues->permissions->contains('canonical',
        $permissionCanonical);
    }

    public function wishlist(){
        return $this->belongsToMany(Product::class,'wishlist','user_id','product_id');
    }

    public function checkWishlist($product_id){
        return $this->wishlist()->where('product_id',$product_id)->exists();
    }

    public function countWishlist(){
        return $this->wishlist()->where('user_id',auth()->id())->count();
    }
}
