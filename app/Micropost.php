<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Micropost extends Model
{
    protected $fillable=['content'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    //この投稿したmicropostのidをお気に入り追加したユーザ
    
    public function favorites_users()
    {
        return $this->belongsTo(User::class, 'user_follow', 'micropost_id', 'user_id')->withTimestamps();
    }
}
