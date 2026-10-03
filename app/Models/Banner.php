<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Banner extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'image',
        'link_url',
        'is_active',
        'order',
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }

        if (file_exists(public_path('images/' . $this->image))) {
            return url('images/' . $this->image);
        }

        if (file_exists(public_path($this->image))) {
            return url($this->image);
        }

        if (file_exists(public_path('storage/images/' . $this->image))) {
            return url('storage/images/' . $this->image);
        }

        return url('images/' . $this->image);
    }
}
