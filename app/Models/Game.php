<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $guard = ['id'];
    protected $fillable = ['name', 'description', 'url', 'url_image', 'status','file_id'];
    protected $casts = [
        'status' => 'boolean',
    ];



    public function setNameAttribute($value)
    {
        $this->attributes['name'] = strtoupper($value);
    }
    public function file()
    {
        return $this->belongsTo(File::class);
    }
}
