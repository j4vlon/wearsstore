<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = [
        'title',
        'category',
        'price',
        'description',
        'file_url',
        'status',
    ];

   public function cartItem()
   {
       return $this->belongsTo(CartItem::class);
   }
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
