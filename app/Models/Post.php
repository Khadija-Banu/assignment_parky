<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    //table column name define
    protected $fillable=['user_id','title','description','date','image'];

    // many to one relation in  Post to user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
