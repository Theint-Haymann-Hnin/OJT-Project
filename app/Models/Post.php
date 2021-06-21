<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $fillable=['title','description','status','created_user_id','updated_user_id','deleted_user_id'];

    public function user(){
        return $this->belongsTo(User::class , 'created_user_id');
        
    }
   
}
