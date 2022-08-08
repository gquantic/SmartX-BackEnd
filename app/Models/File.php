<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static create(array $array)
 */
class File extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'path',
        'type',
    ];
}
