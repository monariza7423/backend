<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work;

class WorkController extends Controller
{
    public function index() {
        $works = Work::all();
        return response()->json($works);
    }

    public function create(Request $request) {
        $work = new Work();
        $work->title = $request->input('title');
        $work->text = $request->input('text');
        if ($request->hasFile('avatar')){
            $imagePath = $request->file('avatar') -> store('images', 'public');
            $work->avatar = $imagePath;
        }
        $work->created_at = now();
        $work->save();
        return response()->json(Work::all());
    }

    public function update(Request $request, $id) {
        $work = Work::find($id);
        $work->title = $request->input('title');
        $work->text = $request->input('text');
        $work->avatar = $request->input('avatar');
        $work->updated_at =now();
        $work->save();
        return response()->json($work);
    }

    public function destroy ($id) {
        $work = Work::find($id);
        if ($work) {
            $work->delete();
            return response() -> json(['message' => 'News Item Deleted']);
        } else {
            return response() -> json(['message' => 'NewsItemNotFound']);
        }
    }
}
