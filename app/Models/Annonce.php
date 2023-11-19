<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annonce extends Model
{
    protected $table ='annonce';
    use HasFactory;
    protected $fillable = [

        'idUser','titre','description','prix','categorie','statu'

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'idUser', 'id');
    }
    public function image()
    {
        return $this->hasMany(Image::class, 'IdAnnonce', 'id');
    }
    protected $with = ['image'];
}

