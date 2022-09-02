<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'title',
        'category',
        'deadline',
        'status'
    ];

        // Query search
    public function scopeFilter($query, array $filters){


        if($filters['status'] ?? false) {
            
            $query->where('status', 'like', '%' . request('status'). '%');

        }else {
            
            $query->where('status', 'like', '%' . request('status'). '%');

        }

        
    }

    

}
