<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Day extends Model
{
    use HasFactory;

    protected $days = [
        'saturday'=>'saturday',
        'monday' => 'monday',
        'sunday' => 'sunday',
        'thursday'=>'thursday',
        'wednesday'=>'wednesday',
        'tuesday'=>'tuesday'
    ];


    public  function getdays()
    {
        return $this->days;
    }

    protected $fillable=['name','user_id','week_id'];

    public function week()
    {
        return $this->belongsTo(Week::class);
    }

    public function missions()
    {
        return $this->hasMany(Missions::class);
    }
}
