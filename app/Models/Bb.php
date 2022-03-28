<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Bb extends Model
{
    use HasFactory;
    use Searchable;
    protected $fillable = ['title', 'pic', 'content', 'price', 'user_id'];

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'pic' => $this->pic,
            'content' => $this->content,
            'price' => $this->price,
     ];
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
