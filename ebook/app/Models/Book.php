<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $table = "book";
    protected $fillable = ['title','description','author','publisher','date_of_issue'];
    public function book(){
        return $this;
    }
}
