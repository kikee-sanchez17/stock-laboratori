<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consum extends Model
{
    use HasFactory;
    protected $fillable=['usuari_id','data','cas','concentracio','motiu','consum','product_id'];
}
