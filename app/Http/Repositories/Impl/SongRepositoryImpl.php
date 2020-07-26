<?php


namespace App\Http\Repositories\Impl;


use App\Http\Repositories\Eloquent\EloquentRepository;
use App\Http\Repositories\SongRepository;
use App\Song;

class SongRepositoryImpl extends EloquentRepository implements SongRepository
{
    public function getModel()
    {
        $model = Song::class;
        return $model;
    }
}
