<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Instruktori extends Model
{
    public $timestamps = false;
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'ime_prezime',
        'broj_dodijeljenih_kandidata',

    ];

    public function kandidati()
    {
        return $this->hasMany(Kandidati::class, 'instruktor_id', 'id');
    }

    

    protected $table = 'instruktori';
}

