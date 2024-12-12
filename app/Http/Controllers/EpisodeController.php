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
            "episodes" => [
            [
                "name" => "chapter 1",
                "duration" => "1:05:06"
            ],
            [
                "name" => "chapter 2",
                "duration" => "59:06",
            ],
            [
                "name" => "chapter 3",
                "duration" => "45:19",
            ],
            [
                "name" => "chapter 4",
                "duration" => "53:00",
            ],
            [
                "name" => "chapter 5",
                "duration" => "41:19",
            ],
            [
                "name" => "chapter 6",
                "duration" => "51:35",
            ],
            [
                "name" => "chapter 7",
                "duration" => "41:33",
            ],
            [
                "name" => "chapter 8",
                "duration" => "54:17",
            ],
            [
                "name" => "chapter 9",
                "duration" => "42:03",
            ],
            [
                "name" => "chapter 10",
                "duration" => "44:52",
            ],
            [
                "name" => "chapter 11",
                "duration" => "1:00:25",
            ],
            [
                "name" => "chapter 12",
                "duration" => "59:24",
            ]]]
        );
    }

    public function getPath(int $bookId, int $episodeId): string
    {
        return storage_path("/" . $bookId . "/ " . "adventureholmes_" . $episodeId . "_doyle_64kb.mp3");
    }

    public function listen(int $bookId, int $episodeId): BinaryFileResponse
    {
        return new BinaryFileResponse(
            $this->getPath($bookId, $episodeId)
        );
    }
}
