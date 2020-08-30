<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User as User;

class Material extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User', 'id_teacher');
    }

    protected $table = 'materials';

    protected $fillable = [
        'id_teacher', 'lesson', 'materials', 'status'
    ];
}
