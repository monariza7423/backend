<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    public function index(Request $request) {
        $limit = $request->input('limit', 3);
        $news = News::take($limit)->get();
        return response()->json($news);
    }

    public function create(Request $request) {
        $news = new News;
        $news->title = $request->title;
        $news->html_content = $request->html_content;
        $news->save();

        return response()->json($news);
    }

    public function show($id){
        $news = News::find($id);
        $news->avatar_url = $news->avatar ? asset('storage/' . $news->avatar) : null;
        return response() -> json($news);
    }

    public function update(Request $request, $id) {
        $news = News::find($id);
        $news->title = $request->input('title');
        $news->text = $request->input('text');
        $news->avatar = $request->input('avatar');
        $news->updated_at =now();
        $news->fill($data)->save();
        return response()->json($news);
    }

    public function destroy ($id) {
        $news = News::find($id);
        if ($news) {
            $news->delete();
            return response() -> json(['message' => 'News Item Deleted']);
        } else {
            return response() -> json(['message' => 'NewsItemNotFound']);
        }
    }
}
