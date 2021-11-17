<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use NumberFormatter;

class Missions extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['user_id','day_id','name','mission_type','ReportingTime_date','reporting_method','checkOut_time','chekOutLocation'
        ,'checkIn_time','finish_time','secCheckout_time','chekOut_address','status','cost'
        ];
    protected $checked = [
        'checked' => 'boolean'];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function day()
    {
        return $this->belongsTo(Day::class);
    }
    public function getFormattedCostAttribute()
    {
        $fomatter = new NumberFormatter(App::getLocale(), NumberFormatter::CURRENCY);
        return $fomatter->formatCurrency($this->cost, ' NLS');
    }
}
