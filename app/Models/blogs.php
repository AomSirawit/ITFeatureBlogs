<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\category;

class blogs extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(category::class, 'cate_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
