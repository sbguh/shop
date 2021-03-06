<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
  use Sluggable;
  protected $fillable = [
                  'title','slug','seo_title','seo_keyword','seo_description', 'description', 'image', 'on_sale','rating', 'sold_count', 'review_count', 'price'
  ];
  protected $casts = [
      'on_sale' => 'boolean', // on_sale 是一个布尔类型的字段
  ];
  // 与商品SKU关联
  public function skus()
  {
      return $this->hasMany(ProductSku::class);
  }

  public function getImageUrlAttribute()
   {
       // 如果 image 字段本身就已经是完整的 url 就直接返回
       if (Str::startsWith($this->attributes['image'], ['http://', 'https://'])) {
           return $this->attributes['image'];
       }
       return \Storage::disk('public')->url($this->attributes['image']);
   }

   /**
    * Return the sluggable configuration array for this model.
    *
    * @return array
    */
   public function sluggable()
   {

       return [
           'slug' => [
               'source' => 'title'
           ]
       ];
   }


}
