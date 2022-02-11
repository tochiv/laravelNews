<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'editor_id',
        'title',
        'text',
        'publication_date',
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
