<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';
    protected $primaryKey = 'id';
    protected $keyType = 'int';
    protected $guarded = [];
    protected $casts = [
        'status' => 'boolean'
    ];
    protected $fillable = [
        'website_id',
        'title',
        'description',
        'status',
        'created_at',
        'updated_at'
    ];
    public $incrementing = true;
    public $timestamps = false;
}
