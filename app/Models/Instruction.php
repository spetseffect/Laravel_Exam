<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Instruction extends Model
{
    use HasFactory;

    public static function index(){
        $result=DB::table('instructions as i')
            ->join('users as u','u.id','=','i.author_id')
            ->join('statuses as s','s.id','=','i.status_id')
            ->join('devices as d','d.id','=','i.device_id')
            ->select([
                'i.id as id',
                'i.name as name',
                's.name as status',
                'u.name as author',
                'i.updated_at as updated',
                'd.name as device',
                'i.filename as file'
            ])
            ->get();
        return $result;
    }

    public static function search($string){
        return DB::table('instructions as i')
            ->join('users as u','u.id','=','i.author_id')
            ->join('statuses as s','s.id','=','i.status_id')
            ->join('devices as d','d.id','=','i.device_id')
            ->where('i.name','like','%'.$string.'%')
            ->orWhere('d.name','like','%'.$string.'%')
            ->select([
                'i.id as id',
                'i.name as name',
                's.name as status',
                'u.name as author',
                'i.updated_at as updated',
                'd.name as device',
                'i.filename as file'
            ])
            ->get();
    }
}
