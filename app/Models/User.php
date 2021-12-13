<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    public $additional_attributes = ['full_name'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getFullNameAttribute()
    {
        if (!empty($this->surname))
            return $this->name.' '.$this->surname;

        return $this->name;
    }

    public function address()
    {
        return $this->belongsTo('App\Models\Address');
    }
    public function order()
    {
        return $this->hasMany('App\Models\Order', 'user_id');
    }
    static function getUserData($id)
    {
        $user = User::find($id);
        $data = collect([

        ]);

        return $data;
    }
}
