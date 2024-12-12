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
               "part 1",
               "part 2",
               "part 3",
               "part 4",
               "part 5",
               "part 6",
               "part 7",
               "part 8",
               "part 9",
               "part 10",
               "part 11",
               "part 12",
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
