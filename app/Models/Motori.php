<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motori extends Model
{
    public $timestamps = false;
    use HasFactory;

    /**
     * @var string[]
     * 
    */
    public function kandidati()
    {
        return $this->hasMany(Kandidati::class, 'motor_id', 'id');
    }


    protected $table = 'motori';
}
