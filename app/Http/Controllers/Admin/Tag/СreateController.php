<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;

class СreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.tag.create');
    }
}
