<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'title',
        'text',
        'publication_date',
        'approve'
    ];

    public function user()
    {
        $this->belongsTo(User::class);
    }

    public function comments()
    {
        $this->hasMany(Comment::class);
    }
}
