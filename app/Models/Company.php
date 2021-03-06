<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'companies';
    protected $fillable =[
        'name'
    ];
    public function employees(){
        return $this->hasMany(User::class);
    }
    public static function boot() {
        parent::boot();

            static::deleting(function($user) { // before delete() method call this
            $user->photos()->delete();
            // do the rest of the cleanup...
        });
    }
}
