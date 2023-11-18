<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table ='images';
    use HasFactory;
    protected $fillable = [

        'url_image','idAnnonce','idUser'
    ];
    public function annonce()
    {
        return $this->belongsTo(Annonce::class, 'IdAnnonce', 'id');
    }
    public function users(){
        return $this->belongsTo(User::class,'IdUser','id');
    }
}
