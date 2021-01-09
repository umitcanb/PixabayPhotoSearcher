<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
//use Storage;
use Illuminate\Support\Facades\Storage;




class PhotoController extends Controller
{
   
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

        $url = $request->lowResolution;
        
        $content = file_get_contents($url);
        
        $photo = Photo::create();

        $name = $photo->id . "." . substr($url, strrpos($url, '.', -1) + 1);
        //$name = substr($url, strrpos($url, '/') + 1);
        Storage::put($name, $content);
        //$content->storeAs('storage/app/public', $name, ['disk'=>'public']);
        //Storage::disk('local')->put($name, $content);


        $photo->update(
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
            $url = asset(Storage::url($photo->file_name));
            array_push($arrayOfUrls, $url);
        }
        
        return view('photo.saved', ['photos' => json_encode($arrayOfUrls)]);
    }

    public function unsaveImage(Request $request){

        $url = $request->url;
        $name = substr($url, strrpos($url, '/', -1) + 1);

        $photo = Photo::where('file_name', $name)->first();

        $photo->delete(); 
        Storage::delete($name);
    }

  
   

}
