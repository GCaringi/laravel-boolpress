<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();

        return $tags;

    }

    public function show($slug)
    {
        $tag = Tag::with(['posts' => function($q) {
            $q->where('published', true);
        }])->where('slug', $slug)->first();

        return $tag;
    }
}
