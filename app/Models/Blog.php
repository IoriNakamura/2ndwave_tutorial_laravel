<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Kyslik\ColumnSortable\Sortable; 

class Blog extends Model
{
    use Sortable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        
        'title',
        'content',
        'created_user_id',
        'ceated_at',
        'updated_at',
    ];

    public $sortable = 
    [
        'id',
       // 'date',
        //'subject',
        //'sum',
        //'user_id'
    ];//追記(ソートに使うカラムを指定

    public function user()
    {
        return $this->belongsTo(User::class, 'created_user_id');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class, 'blog_id');
    }

    public function nices(): HasMany
    {
        return $this->hasMany(Nice::class, 'blog_id');
    }
}