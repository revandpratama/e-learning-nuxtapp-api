<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user() {
        return  $this->belongsTo(User::class);
    }

    public function krs() {
        return $this->belongsTo(Krs::class);
    }

    public function getSubjectNameAttribute() {
        return $this->krs->subject->name;
    }
    public function getSubjectCreditsAttribute() {
        return $this->krs->subject->credits;
    }
}
