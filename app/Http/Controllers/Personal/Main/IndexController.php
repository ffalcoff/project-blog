<?php

namespace App\Http\Controllers\Personal\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [];

        $data['userPostLikedCount'] = auth()->user()->likedPosts->count();
        $data['userCommentsCount'] = auth()->user()->comments->count();

        return view('personal.main.index', compact('data'));
    }
}
