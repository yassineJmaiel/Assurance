<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class membreFamille extends Model
{
    use HasFactory;

    public function remboursements()
    {
        return $this->hasMany(Remboursement::class, 'id_membre', 'id');
    }
}
