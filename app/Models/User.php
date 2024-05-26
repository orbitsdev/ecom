<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Order;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    public function getFullName(){
        return $this->name;
    }

    public function getUserImage()
    {
        if (!empty(Auth::user()->profile_photo_path)) {
            return Storage::disk('public')->url(Auth::user()->profile_photo_path);
        } else {
            return asset('images/placeholder.png');
        }
    }

    public function profile(): MorphOne
    {
        return $this->morphOne(File::class, 'fileable');
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

   

 
    public function hasManyPreparingOrders(){
         $preparingOrdersCount = Auth::user()->orders
            ->where('status', 'prepairing')
            ->count();

          
       
        return $preparingOrdersCount > 1;
           

    }
}
