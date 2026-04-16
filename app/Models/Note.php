<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'content',
        'folder_id',
        'is_archived'
    ];


    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}