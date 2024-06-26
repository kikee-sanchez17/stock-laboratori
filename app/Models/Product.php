<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['cas','nom','fds','concentracio','estat','tipus_concentracio','capacitat','caducitat','armari','quantitat'];
    public function scopeWithQuantityGreaterThanZero($query)
{
    return $query->where('quantitat', '>', 500);
}
}

