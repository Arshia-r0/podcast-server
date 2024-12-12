<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class EpisodeController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            "books" => [
                [
                'book_id' => 1,
                'name' => 'sherlock holmes 1',
                'episode_count' => 12
                ],
            ]
        ]);
    }

    public function show(): JsonResponse
    {
       return response()->json([
           'episodes' => [
               "chapter 1",
               "chapter 2",
               "chapter 3",
               "chapter 4",
               "chapter 5",
               "chapter 6",
               "chapter 7",
               "chapter 8",
               "chapter 9",
               "chapter 10",
               "chapter 11",
               "chapter 12",
           ],
       ]);
    }

    public function getPath(int $bookId, int $episodeId): string
    {
        return storage_path("/" . $bookId . "/ ". "adventureholmes_" . $episodeId . "_doyle_64kb.mp3");
    }

    public function listen(int $bookId, int $episodeId): BinaryFileResponse
    {
        return new BinaryFileResponse(
            $this->getPath($bookId, $episodeId)
        );
    }
}
