<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    public $fillable = ['author_id', 'title', 'content'];
    public $timestamps = false;

    public function user()
    {//uwaga dzieki zapisowi ponizej jest mozliwe stsosowanie tego w  widoku $article->author->name
        // - uwaga!! podczas wprowadzania modyfikacjaz formulrarza toprestalo dzilac
        return $this->belongsTo(User::class, 'author_id');

    }

    public function photos()
    {
        return $this->hasMany(ArticlePhotos::class);
    }

    public function firstPhoto()
    {
        return $this->photos->first();
    }



//https://onlinewebtutorblog.com/eloquent-accessors-and-mutators-in-laravel/
//konwersja danych wejsciowych - tytuł artykulu - MUTATOR

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = strtolower($value);
    }


//akcesor
//transformacja danych wykjsciowych

    public function getContentAttribute($value)
    {
        return strtoupper($value);
    }


}
