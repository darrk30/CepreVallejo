<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;

class VideosController extends Controller
{
    public function index(){        
        return view('dashboard.video');
    }

    public function show(Video $video){
        $relatedVideos = Video::where('category_id', $video->category_id)
                          ->where('id', '!=', $video->id) // Excluir el video actual
                          ->take(5) // Limitar a 5 videos
                          ->get();
        return view('dashboard.showVideo', compact('video', 'relatedVideos'));
    }
}
