<?php

namespace App\Models;

use DogType;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use \Sushi\Sushi;
    protected $rows = [
        [
            'id'   => 1,
            'name' => 'Midnight',
            'type' => 'Black Fell Terrier',
        ],
        [
            'id'   => 2,
            'name' => 'Celeste',
            'type' => 'Husky Mix',
        ],
        [
            'id'   => 3,
            'name' => 'Renata',
            'type' => 'German Shepard Mix',
        ],
    ];

    public function type()
    {
        return $this->belongsTo(DogType::class);
    }
}
