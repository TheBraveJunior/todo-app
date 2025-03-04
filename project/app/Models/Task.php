<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $fillable = ['title', 'description', 'status', 'user_id', 'session_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
