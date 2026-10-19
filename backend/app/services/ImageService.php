<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\UploadedFile;
use Exception;

class ImageService
{
    public static function uploadParaImgBB(UploadedFile $file)
    {
        $apiKey = env('IMGBB_API_KEY');

        if (!$apiKey) {
            throw new Exception('A chave IMGBB_API_KEY não está configurada no ambiente.');
        }

        // Converte o ficheiro para base64
        $imageResource = fopen($file->getRealPath(), 'r');
        $imageStream = stream_get_contents($imageResource);
        $imageBase64 = base64_encode($imageStream);

        $response = Http::asForm()->post("https://api.imgbb.com/1/upload", [
            'key' => $apiKey,
            'image' => $imageBase64,
        ]);

        if ($response->successful()) {
            return $response->json('data.url');
        }

        throw new Exception('Erro ao fazer upload da imagem para o ImgBB.');
    }
}
