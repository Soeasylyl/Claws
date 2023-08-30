<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'contacts', 'hidden'];
    public function records()
    {
        return $this->hasMany(Record::class, 'client_id');
    }
}
