<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{

    /**
     * Transform the resource collection into an array.
     * resource colletction - zasoby koleckji przeksztalcanie zawrtosci danych z db na postac np tablicowa i reprezentowanir tego w widoku
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
