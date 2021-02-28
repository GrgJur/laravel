<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Database\Eloquent\SoftDeletes;
use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $casts = [
        'course_id' => 'int',
        'instructor_id' => 'int',
        'member_id' => 'int'
    ];



    public function instructor(){
        return $this->belongsTo(Instructor::class);
    }
    public function member(){
        return $this->belongsTo(Member::class);
    }
    public function course(){
        return $this->belongsTo(Course::class);
    }


}
