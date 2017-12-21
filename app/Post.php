<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Table Name
    protected $table = 'posts'; // pode ser alterado comportamento default criado pelo Migration (default: nome do model no plural)

    // Primary Key
    public $primaryKey = 'id'; // pode ser alterado comportamento default criado pelo Migration (default setado no arquivo de migration)

    // Timestamps
    public $timestamps = true; // true: grava created_at e updated_at

    // Models relationship (child table with foreign key (Posts) point to mother with primary key(User))
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
