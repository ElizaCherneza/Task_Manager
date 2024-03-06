<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Filterable;

class Project extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = 'projects';
    protected $guarded = [];
    protected $fillable = ['title', 'text', 'user_id', 'done']; 

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
