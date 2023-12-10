<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class History extends Model
{
    use HasFactory;
    protected $table = 'histories';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public $incrementing = true;
    public $timestamps = true;
    
    public function book() {
        return $this->belongsTo(Books::class);
    }
    
    public function user() {
        return $this->belongsTo(User::class);
    }
}
