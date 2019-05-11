<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
	protected $table = 'products';

	protected $fillable = ['name', 'slug', 'image', 'details', 'price', 'description', 'category_id'];

    public function presentPrice()
	{
		// return money_format('$%i', $this->price / 100);
		return $result = "Rp " . number_format($this->price,2,',','.');
	}

	public function scopeMightAlsoLike($query)
	{
		return $query->inRandomOrder()->take(4);
	}

	public function category()
	{
		$this->belongsTo(Category::class);
	}
}
