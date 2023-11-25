<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidati extends Model
{
    public $timestamps = false;
    use HasFactory;

    /**
     * @var string[]
     * 
    */

    protected $fillable = [
        'imeprezime',
        'datumRodjenja',
        'kategorijaPolaganja',
    ];

    public function motor()
    {
        return $this->belongsTo(Motori::class, 'motor_id', 'id');
    }

    protected $table = 'kandidati';

}
