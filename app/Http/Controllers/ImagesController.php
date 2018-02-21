<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesController extends Controller
{
    public function save(Request $request)
    {
        $image = $request->input('image');

        $fileName = '/uploads/img/' . time() . $request->input('fileName');

        $path = public_path() . $fileName;

        $image = substr($image, strpos($image, ",") + 1);
        $data = base64_decode($image);

        $success = file_put_contents($path, $data);

        $response = array(
            'path' => $fileName,
        );

        if ($success) {
            return response($response);
        }

        return response("Erro ao salvar o arquivo", 500);
    }

}
