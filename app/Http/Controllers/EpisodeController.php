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
               "chapter 1" => "1:05:06",
               "chapter 2" => "59:06",
               "chapter 3" => "45:19",
               "chapter 4" => "53:00",
               "chapter 5" => "41:19",
               "chapter 6" => "51:35",
               "chapter 7" => "41:33",
               "chapter 8" => "54:17",
               "chapter 9" => "42:03",
               "chapter 10" => "44:52",
               "chapter 11" => "1:00:25",
               "chapter 12" => "59:24",
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
