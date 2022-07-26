<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Kyslik\ColumnSortable\Sortable; 

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use Sortable;

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
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
        public $sortable = 
        [
            'id',
        // 'date',
            //'subject',
            //'sum',
            //'user_id'
        ];//追記(ソートに使うカラムを指定

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'created_user_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'commented_user_id');
    }

    public function nices() : HasMany
    {
        return $this->hasMany(Nice::class, 'user_id');
    }
}
