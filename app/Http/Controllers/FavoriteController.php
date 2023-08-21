<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Favorite;
use Illuminate\Http\Request;
use App\Http\Requests\CreateFavoriteRequest;
use App\Http\Requests\DestroyFavoriteRequest;
use Illuminate\Http\Response;

class FavoriteController extends Controller
{
    public function index(Request $request)
    {
        $favorites = $request->user()->favorites;
        return FavoriteResource::collection($favorites);
    }

    public function store(CreateFavoriteRequest $request, Post $post)
    {
        $request->user()->favorites()->create(['post_id' => $post->id]);

        return response()->noContent(Response::HTTP_CREATED);
    }

    public function destroy(Request $request, Post $post)
    {
        $favorite = $request->user()->favorites()->where('post_id', $post->id)->firstOrFail();

        $favorite->delete();

        return response()->noContent();
    }
}
