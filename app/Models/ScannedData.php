<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScannedData extends Model
{
    use HasFactory;

    protected $fillable = [
        'content'
    ];  

}