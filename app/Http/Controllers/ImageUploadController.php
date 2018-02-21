<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageUploadController extends Controller
{
    public function save(Request $request){
        $image = $request->input('image');

        $fileName = time().$request->input('fileName');
        $path = public_path().'/uploads/img/' . $fileName;

        $data = base64_decode($image);
    
        $success = file_put_contents($path, $data);   
        	
        $response = array(           
            'path' => '/uploads/img/' 
        );
      
        if ($success) {
            return response($response);
        }

        return response("Erro ao salvar o arquivo",500);
    }
}
