<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Part;

class Product extends Model
{
    use HasFactory;

    public function parts(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Part::class);
    }
}
