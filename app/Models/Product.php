<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $timestamp = false;
    protected $fillable = [
    'id',
    'name',
    'description',
    'seller_id',
    'category_id',
    'guarantee',
    'picture_url',
    'price',
    'status',
    'amount'];
    protected $primaryKey = 'id';
}
