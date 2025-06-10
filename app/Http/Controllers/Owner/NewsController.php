<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();
        return view('owner.news.index', compact('news'));
    }

    public function create()
    {
        return view('owner.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        News::create([
            'title' => $request->title,
            'content' => $request->content,
            'published_at' => now(),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('owner.news.index')->with('success', 'Berita ditambahkan');
    }

    public function edit(News $news)
    {
        return view('owner.news.edit', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
        ]);

        $news->update([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('owner.news.index')->with('success', 'Berita diperbarui');
    }

    public function destroy(News $news)
    {
        $news->delete();
        return back()->with('success', 'Berita dihapus');
    }
}
