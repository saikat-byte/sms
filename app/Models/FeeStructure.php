<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeeStructure extends Model
{
    use HasFactory;

    protected $fillable = [
        "student_classes_id",
        "academic_years_id",
        "fee_heads_id",
        "january",
        "february",
        "march",
        "april",
        "may",
        "june",
        "july",
        "august",
        "september",
        "october",
        "november",
        "december",
    ];


    public function AcademicYear(){

       return $this->belongsTo(AcademicYear::class, 'academic_years_id');
    }
    public function StudentClasses(){

        return $this->belongsTo(StudentClass::class, 'student_classes_id');
    }
    public function FeeHead(){

        return  $this->belongsTo(FeeHead::class, 'fee_heads_id');
    }
}
