<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Products extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "products_name",
        "products_image",
        "category_id",
    ];

    public function categories(): BelongsTo
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
}
