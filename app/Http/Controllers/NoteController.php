<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function index(Request $request)
    {
        $folders = Folder::all();

        $folderId = $request->query('folder_id');

        $notes = Note::query()
            ->when($folderId, function ($q) use ($folderId) {
                $q->where('folder_id', $folderId);
            })
            ->get();

        return view('notes', compact('notes', 'folders'));
    }

    public function store(Request $request)
{
    Note::create([
        'user_id' => Auth::id(),
        'title' => $request->title,
        'content' => $request->content,
        'folder_id' => $request->folder_id ?: null
    ]);

    return redirect('/notes');
}

   public function createFolder(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255'
    ]);

    Folder::create([
        'user_id' => Auth::id(),
        'name' => $request->name
    ]);

    return back();
}

    public function deleteNote($id)
    {
        Note::where('id', $id)->delete();
        return back();
    }

    public function deleteFolder($id)
    {
        Note::where('folder_id', $id)->delete();
        Folder::where('id', $id)->delete();
        return back();
    }
}