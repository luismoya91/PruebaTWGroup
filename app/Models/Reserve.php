<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserve extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'date_reserve', 'status' ];

    static function validateDate(String $dateTimeS, Int $room_id){
        $dateTime = new DateTime($dateTimeS.':00');
        $reserves = self::where('date_reserve', '>=', $dateTimeS)->where('room_id', $room_id)->get();
        if($reserves->count() == 0){
            return true;
        }else{
            foreach ($reserves as $key => $reserve) {
                $dateTimeT = new DateTime($reserve->date_reserve);
                if($dateTimeT->format('H:i') == $dateTime->format('H:i')){
                    return false;
                }
            }
            return true;
        }
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function getStatusAttribute($value)
    {
        $castValue = "";
        switch ($value) {
            case 'accepted':
                $castValue = 'Aceptado';
                break;
            case 'rejected':
                $castValue = 'Cancelado';
                break;
            case 'pending':
                $castValue = 'Pendiente';
                break;

            default:
                $castValue = $value;
                break;
        }

        return $castValue;
    }
}
