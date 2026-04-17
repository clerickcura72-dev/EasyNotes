<!DOCTYPE html>

<html>
<head>
    <title>EasyNotes</title>

```
<style>
    select {
        margin-top: 10px;
    }

    body {
        margin: 0;
        font-family: "Segoe UI", Arial;
        background: #f6f7fb;
    }

    .topbar {
        background: white;
        padding: 14px 20px;
        display: flex;
        justify-content: space-between;
        border-bottom: 1px solid #eee;
    }

    .layout {
        display: flex;
    }

    .sidebar {
        width: 260px;
        background: white;
        height: calc(100vh - 60px);
        padding: 15px;
        border-right: 1px solid #eee;
    }

    .main {
        flex: 1;
        padding: 25px;
    }

    .folder-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 6px;
    }

    .folder {
        flex: 1;
        padding: 10px;
        border-radius: 8px;
        text-decoration: none;
        color: #333;
    }

    .folder:hover {
        background: #f1f1f1;
    }

    .delete-btn {
        background: red;
        color: white;
        border: none;
        padding: 5px 8px;
        border-radius: 6px;
        cursor: pointer;
    }

    .note-box {
        background: white;
        padding: 15px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 20px;
    }

    .note-box form {
        display: flex;
        flex-direction: column;
        gap: 15px; 
    }

    input, textarea, select {
        width: 95%;
        padding: 10px;
        margin: 0;
        border: 1px solid #ddd;
        border-radius: 8px;
        display: block;
    }

    textarea {
        height: 100px; 
        resize: vertical;
    }

    button {
        background: #4f46e5;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 8px;
        cursor: pointer;
    }

    .notes {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(230px, 1fr));
        gap: 15px;
    }

    .note {
        background: white;
        padding: 15px;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }

    .note h3 {
        margin: 0 0 8px 0;
    }

    .danger {
        background: red;
        margin-top: 10px;
    }

    .edit-btn {
        display: inline-block;
        margin-top: 10px;
        padding: 8px;
        background: #10b981;
        color: white;
        border-radius: 6px;
        text-decoration: none;
        text-align: center;
    }

    .edit-btn:hover {
        opacity: 0.9;
    }
</style>
```

</head>

<body>

<div class="topbar">
    <h2>📝 EasyNotes</h2>

```
<form method="POST" action="/logout">
    @csrf
    <button>Logout</button>
</form>
```

</div>

<div class="layout">

```
<!-- SIDEBAR -->
<div class="sidebar">

    <h3>Folders</h3>

    <!-- CREATE FOLDER -->
    <form method="POST" action="/folders">
        @csrf
        <input name="name" placeholder="New folder" required>
        <button>Create</button>
    </form>

    <hr>

    <a class="folder" href="/notes">📁 All Notes</a>

    @foreach($folders as $folder)
        <div class="folder-row">

            <a class="folder" href="/notes?folder_id={{ $folder->id }}">
                📁 {{ $folder->name }}
            </a>

            <form method="POST" action="/folders/delete/{{ $folder->id }}">
                @csrf
                <button class="delete-btn">✕</button>
            </form>

        </div>
    @endforeach

</div>

<!-- MAIN -->
<div class="main">

    <!-- CREATE NOTE -->
    <div class="note-box">
        <form method="POST" action="/notes">
            @csrf

            <input name="title" placeholder="Title" required>
            <textarea name="content" placeholder="Write note..." required></textarea>

            <select name="folder_id">
                <option value="">No Folder</option>
                @foreach($folders as $folder)
                    <option value="{{ $folder->id }}">
                        {{ $folder->name }}
                    </option>
                @endforeach
            </select>

            <button>Save Note</button>
        </form>
    </div>

    <!-- NOTES -->
    <div class="notes">

        @forelse($notes as $note)
            <div class="note">
                <h3>{{ $note->title }}</h3>
                <p>{{ $note->content }}</p>

                <!-- EDIT BUTTON -->
                <a href="/notes/edit/{{ $note->id }}" class="edit-btn">
                    Edit
                </a>

                <!-- DELETE -->
                <form method="POST" action="/notes/delete/{{ $note->id }}">
                    @csrf
                    <button class="danger">Delete</button>
                </form>
            </div>
        @empty
            <p>No notes found.</p>
        @endforelse

    </div>

</div>
```

</div>

</body>
</html>
