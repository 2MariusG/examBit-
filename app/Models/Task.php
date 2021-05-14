<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
      public function taskForm()
   {
       return $this->belongsTo('App\Models\Form', 'form_id', 'id');
   }

}
