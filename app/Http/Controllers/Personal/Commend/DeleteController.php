<?php

namespace App\Http\Controllers\Personal\Commend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    public function __invoke(Comment $comment)
    {
        $comment->delete();
        return view('personal.comment.index');
    }
}
