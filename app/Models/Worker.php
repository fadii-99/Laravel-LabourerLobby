<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\City;
use App\Models\File;
use App\Models\Profession;
class Worker extends Model
{
    use HasFactory;

    public function prof()
    {
        return $this->belongsTo(Profession::class,'profession_id','id');
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function file()
    {
        return $this->belongsTo(File::class);
    }
    public function woker()
    {
        return $this->belongsTo(HireHistory::class);
    }
}
