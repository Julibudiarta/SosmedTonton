<?php

namespace App\Models;
use illuminate\Support\Facades\Auth;
use App\Http\Controllers\LikeController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    use HasFactory;
    protected $table ='post';
    
}
