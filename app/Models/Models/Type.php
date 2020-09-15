<?php

namespace App\Models\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;

    const INCOME = 1;
    const OUTGO = 2;

    public function category()
    {
        return $this->hasMany(Category::class);
    }

    public function history()
    {
        return $this->hasMany(History::class);
    }
}
