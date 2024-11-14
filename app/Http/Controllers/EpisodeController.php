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
           "01" => "part 1",
           "02" => "part 2",
           "03" => "part 3",
           "04" => "part 4",
           "05" => "part 5",
           "06" => "part 6",
           "07" => "part 7",
           "08" => "part 8",
           "09" => "part 9",
           "10" => "part 10",
           "11" => "part 11",
           "12" => "part 12",
       ]);
    }

    public function getPath(string $bookId, string $episodeId): string
    {
        return storage_path("/" . $bookId . "/ ". "adventureholmes_" . $episodeId . "_doyle_64kb.mp3");
    }

    public function listen(string $bookId, string $episodeId): BinaryFileResponse
    {
        return new BinaryFileResponse(
            $this->getPath($bookId, $episodeId)
        );
    }
}
