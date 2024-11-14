<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Psy\Util\Str;
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

    protected string $basePath = "01";

    public function getPath(string $bookId, string $episodeId): string
    {
        return storage_path() . "/" . $bookId . "/ ". "adventureholmes_" . $episodeId . "_doyle_64kb.mp3";
    }

    public function show($bookId): JsonResponse
    {
        return response()->json([
            ''
        ]);
    }

    public function listen(string $bookId, string $episodeId): BinaryFileResponse
    {
        return new BinaryFileResponse(
            $this->getPath($bookId, $episodeId)
        );
    }
}
