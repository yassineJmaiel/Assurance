<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class remboursement extends Model
{
    use HasFactory;
 

    public function membreFamille()
    {
        return $this->belongsTo(MembreFamille::class, 'id_membre', 'id');
    }

    public function assurer()
    {
        return $this->belongsTo(User::class, 'assurer_id', 'id');
    }
}
