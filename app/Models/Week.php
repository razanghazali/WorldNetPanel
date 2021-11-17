<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Week extends Model
{
    use HasFactory;
    const CREATED_AT = 'created_at';
    const finished_AT = 'finished_at';

    protected $connection = 'mysql';

    protected $table = 'week';

    protected $primaryKey = 'id';

    protected $keyType = 'int';

    public $incrementing = true;

    public $timestamps = true;

    protected $fillable = [
      'name','user_id','created_at','finished_at'
    ];

    public function day()
    {
        return $this->hasMany(Day::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
