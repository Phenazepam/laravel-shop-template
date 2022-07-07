<?php

namespace App\Http\Controllers;
use App\Models\Tag;
use App\http\Requests\Tag\UpdateRequest;
use App\Http\Requests\Tag\StoreRequest;

use Illuminate\Http\Request;

class TagController extends Controller
{
    public function Index()
    {
        $tags = Tag::all();
        return view('tag.index', ['tags' => $tags]);
    }

    public function Create()
    {
        return view('tag.create');
    }

    public function Store(StoreRequest $request)
    {
        $data = $request->validated();
        Tag::firstOrCreate($data);
        return redirect()->route('tag.index');
    }

    public function Edit(Tag $tag)
    {
        return view('tag.edit', ['tag'=>$tag]);
    }

    public function Show(Tag $tag)
    {
        return view('tag.show', ['tag'=>$tag]);
    }

    public function Update(UpdateRequest $request, Tag $tag)
    {
        $data = $request->validated();
        $tag->update($data);
        return view('tag.show', ['tag'=>$tag]);
    }

    public function Delete(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('tag.index');
    }
}
