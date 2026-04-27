<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
   protected $fillable = [
    'title',
    'description',
    'status',
    'user_id',
    'category_id',
    'deadline' // 🔥 TAMBAH INI
];

    // relasi ke user
    public function user() {
        return $this->belongsTo(User::class);
    }

    // relasi ke category
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // relasi ke comments
    public function comments() {
        return $this->hasMany(Comment::class);
    }
}