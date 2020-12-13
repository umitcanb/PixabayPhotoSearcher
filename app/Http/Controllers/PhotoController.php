<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Storage;



class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPhotos(Request $request)
    {
        $response = Http::get('https://pixabay.com/api', [
            'key' => "19444033-331b1230e707e108aa550352a",
            'page' => 1,
            'q' => $request->search,
        ]);

        return view('photo.results', ['response' => $response]);

    }

    public function saveImage(Request $request){

  
        //$url = "https://i.stack.imgur.com/koFpQ.png";
        $url = $request->highResolution;
        $content = file_get_contents($url);
        $name = substr($url, strrpos($url, '/') + 1);
        Storage::put($name, $content);

        $photo = Photo::create(
            [
                'file_name' => $name,
            ]
        );

        return redirect()->route('photo.saved');
    }

    public function getSavedPhotos()
    {
        $photos = Photo::all();

        $arrayOfUrls = [];

        foreach ($photos as &$photo){

            //$url = asset('storage/app/'. $photo->file_name); 
            $url = Storage::url($photo->file_name);
            array_push($arrayOfUrls, $url);
        }
        
        return view('photo.saved', ['photos' => json_encode($arrayOfUrls)]);
    }

  
   

}
