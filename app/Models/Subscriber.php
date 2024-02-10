<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory;
    protected $table = 'subscribers';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $guarded = [];
    protected $fillable = [
        'website_id',
        'email',
        'created_at',
        'updated_at'
    ];
    public $incrementing = true;
    public $timestamps = false;
}
