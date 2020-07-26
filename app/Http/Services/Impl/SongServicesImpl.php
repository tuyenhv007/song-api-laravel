<?php


namespace App\Http\Services\Impl;


use App\Http\Repositories\SongRepository;
use App\Http\Services\SongServices;

class SongServicesImpl implements SongServices
{
    protected $songRepository;

    public function __construct(SongRepository $songRepository)
    {
        $this->songRepository = $songRepository;
    }

    public function getAll()
    {
        $songs = $this->songRepository->getAll();
        return $songs;
    }

    public function findById($id)
    {
        $song = $this->songRepository->findById($id);
        $statusCode = 200;
        if (!$song) {
            $statusCode = 404;
            $data = [
                'statusCode' => $statusCode,
                'songs' => $song
            ];
        }
        return $data;
    }

    public function create($request)
    {
        $song = $this->songRepository->create($request);
        $statusCode = 201;
        if (!$song) {
            $statusCode = 500;
            $data = [
                'statusCode' => $statusCode,
                'songs' => $song
            ];
        }
        return $data;
    }

    public function update($request, $id)
    {
        $oldSong = $this->songRepository->findById($id);

        if (!$oldSong) {
            $newSong = null;
            $statusCode = 404;
        } else {
            $newSong = $this->songRepository->update($request, $oldSong);
            $statusCode = 200;
        }

        $data = [
            'statusCode' => $statusCode,
            'songs' => $newSong
        ];
        return $data;
    }

    public function destroy($id)
    {
        $song = $this->songRepository->findById($id);

        $statusCode = 404;
        $message = "Song not found";
        if ($song) {
            $this->songRepository->destroy($song);
            $statusCode = 200;
            $message = "Delete success!";
        }

        $data = [
            'statusCode' => $statusCode,
            'message' => $message
        ];
        return $data;
    }
}
