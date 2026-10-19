<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Exception;

class ImageService
{
    public static function uploadParaImgBB(UploadedFile $file): string
    {
        $apiKey = config('services.imgbb.key');

        if (!$apiKey) {
            throw new Exception('A chave do ImgBB não está configurada.');
        }

        $response = Http::asForm()
            ->timeout(30)
            ->post('https://api.imgbb.com/1/upload', [
                'key' => $apiKey,
                'image' => base64_encode(
                    file_get_contents($file->getRealPath())
                ),
            ]);

        if (!$response->successful()) {
            Log::error('Falha no ImgBB', [
                'status' => $response->status(),
                'resposta' => $response->json(),
            ]);

            throw new Exception('O ImgBB recusou o upload da imagem.');
        }

        $url = $response->json('data.url');

        if (!is_string($url) || !filter_var($url, FILTER_VALIDATE_URL)) {
            Log::error('Resposta inválida do ImgBB', [
                'resposta' => $response->json(),
            ]);

            throw new Exception('O ImgBB não retornou uma URL válida.');
        }

        return $url;
    }
}
