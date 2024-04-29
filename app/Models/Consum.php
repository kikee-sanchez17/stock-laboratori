<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User; // Asegúrate de importar el modelo User si aún no lo has hecho
use App\Models\Product; // Asegúrate de importar el modelo Product si aún no lo has hecho

class Consum extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'usuari_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    use HasFactory;
    protected $fillable=['usuari_id','data','cas','concentracio','motiu','consum','product_id'];
}
