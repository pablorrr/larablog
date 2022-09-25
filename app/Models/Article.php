<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public  $fillable=['author_id','title','content'];
    public $timestamps = false;

    public function user()
    {//uwaga dzieki zapisowi ponizej jest mozliwe stsosowanie tego w  widoku $article->author->name
        // - uwaga!! podczas wprowadzania modyfikacjaz formulrarza przestalo dzialac
        return $this->belongsTo(User::class,'author_id');

    }

    //livewire
    public static function search($search)
    {
        return empty($search) ? static::query()
            : static::where('id', 'like', '%' . $search . '%')
                ->orWhere('title', 'like', '%' . $search . '%')
                ->orWhere('content', 'like', '%' . $search . '%');
    }
}
