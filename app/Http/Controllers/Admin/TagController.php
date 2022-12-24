<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Helper\Helper;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    public function index(Tag $tag)
    {   
        return view('admin.tag.index',[
            'tags' => $tag->orderBy('id','desc')->get()
        ]);
    }

    public function create()
    {
        return view('admin.tag.create');
    }

    public function store(Request $request)
    {   
        $request->validate([
            'tag_name' => 'required|unique:tags'
        ]);

        Tag::create([
            'tag_name'        => $request->tag_name,
            'tag_slug'        => Str::slug($request->tag_name),
            'tag_description' => $request->tag_description
        ]);

        return Helper::success("{$request->tag_name} tag created successfully");
    }

    public function edit(Tag $tag)
    {
        return view('admin.tag.edit',[
            'tag' => $tag
        ]);
    }

    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'tag_name' => 'required'
        ]);

        $tag->update([
            'tag_name' => $request->tag_name,
            'tag_description' => $request->tag_description
        ]);

        return Helper::success("{$request->tag_name} tag updated successfully");
    }

    public function delete(Tag $tag)
    {
        $tag->delete();

        return Helper::success("{$tag->tag_name} tag deleted successfully");
    }
}
