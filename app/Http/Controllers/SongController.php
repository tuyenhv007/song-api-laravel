<?php

namespace App\Http\Controllers;

use App\Http\Services\SongServices;
use Illuminate\Http\Request;

class SongController extends Controller
{
    protected $songService;

    public function __construct(SongServices $songService)
    {
        $this->songService = $songService;
    }

    public function index()
    {
        $songs = $this->songService->getAll();
        return response()->json($songs, 200);
    }

    public function show($id)
    {
        $dataSong = $this->songService->findById($id);
        return response()->json($dataSong['songs'], $dataSong['statusCode']);
    }

    public function store(Request $request)
    {
        $dataSong = $this->songService->create($request->all());
        return response()->json($dataSong['songs'], $dataSong['statusCode']);
    }

    public function update(Request $request, $id)
    {
        $dataSong = $this->songService->update($request->all(), $id);
        return response()->json($dataSong['songs'], $dataSong['statusCode']);
    }

    public function destroy($id)
    {
        $dataSong = $this->songService->destroy($id);
        return response()->json($dataSong['message'], $dataSong['statusCode']);
    }
}
