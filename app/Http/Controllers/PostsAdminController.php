<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use App\Http\Requests\PostRequest;

class PostsAdminController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        $posts = $this->post->paginate(8);

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(PostRequest $request)
    {
        $post = $this->post->create($request->all());
        $post->tags()->sync($this->getTagsIDs($request->tags));

        return redirect()->route('admin.posts.index');
    }

    public function edit($id)
    {
        $post = $this->post->find($id);

        return view('admin.posts.edit', compact('post'));
    }

    public function update($id, PostRequest $request)
    {
        $this->post->find($id)->update($request->all());
        $post = $this->post->find($id);
        $post->tags()->sync($this->getTagsIDs($request->tags));

        return redirect()->route('admin.posts.index');
    }

    public function destroy($id)
    {
        $this->post->find($id)->delete();

        return redirect()->route('admin.posts.index');
    }

    private function getTagsIDs($tags)
    {
        $tagList = explode(',', $tags);
        $tagList = array_map('trim', $tagList);
        $tagList = array_filter($tagList);
        $tagsIDs = [];

        foreach ($tagList as $tagName)
        {
            $tagsIDs[] = Tag::firstOrCreate(['name'=>$tagName])->id;
        }

        return $tagsIDs;
    }
}
