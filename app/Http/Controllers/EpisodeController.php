<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class EpisodeController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            '1' => [
                'name' => 'sherlock holmes 1',
                'episode_count' => "12",
            ]
        ]);
    }

    public function show(): JsonResponse
    {
       return response()->json([
           "1" => "part 1",
           "2" => "part 2",
           "3" => "part 3",
           "4" => "part 4",
           "5" => "part 5",
           "6" => "part 6",
           "7" => "part 7",
           "8" => "part 8",
           "9" => "part 9",
           "10" => "part 10",
           "11" => "part 11",
           "12" => "part 12",
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
