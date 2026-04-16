<!DOCTYPE html>
<html>
<head>
    <title>EasyNotes</title>
<style>
   * {
    box-sizing: border-box;
}

body {
    margin: 0;
    font-family: "Segoe UI", Arial;
    background: #f6f7fb;
    color: #111827;
}

/* TOPBAR */
.topbar {
    background: white;
    padding: 14px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-bottom: 1px solid #eee;
}

/* LAYOUT */
.layout {
    display: flex;
}

/* SIDEBAR */
.sidebar {
    width: 260px;
    background: white;
    min-height: calc(100vh - 60px);
    padding: 18px;
    border-right: 1px solid #eee;
}

.sidebar h3 {
    margin-top: 0;
    font-size: 14px;
    color: #6b7280;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

/* CREATE FOLDER */
.sidebar form {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-bottom: 15px;
}

.sidebar input {
    padding: 10px;
    border-radius: 8px;
    border: 1px solid #e5e7eb;
}

.sidebar button {
    width: 100%;
}

/* FOLDERS */
.folder {
    display: block;
    padding: 10px 12px;
    border-radius: 8px;
    text-decoration: none;
    color: #374151;
    margin-bottom: 5px;
    transition: 0.2s;
}

.folder:hover {
    background: #eef2ff;
    color: #4f46e5;
}

/* MAIN */
.main {
    flex: 1;
    padding: 30px;
}

/* NOTE INPUT BOX */
.note-box {
    background: white;
    padding: 18px;
    border-radius: 14px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
    margin-bottom: 25px;
}

/* INPUTS */
input, textarea, select {
    width: 100%;
    padding: 11px;
    margin-top: 8px;
    margin-bottom: 12px;
    border: 1px solid #e5e7eb;
    border-radius: 10px;
    outline: none;
    transition: 0.2s;
}

input:focus, textarea:focus, select:focus {
    border-color: #4f46e5;
    box-shadow: 0 0 0 2px rgba(79,70,229,0.1);
}

/* BUTTON */
button {
    background: #4f46e5;
    color: white;
    border: none;
    padding: 10px 14px;
    border-radius: 10px;
    cursor: pointer;
    transition: 0.2s;
}

button:hover {
    background: #4338ca;
}

/* NOTES GRID */
.notes {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
    gap: 18px;
}

/* NOTE CARD */
.note {
    background: white;
    padding: 16px;
    border-radius: 14px;
    box-shadow: 0 4px 18px rgba(0,0,0,0.05);
    transition: 0.2s;
    border: 1px solid transparent;
}

.note:hover {
    transform: translateY(-4px);
    border-color: #e0e7ff;
}

/* NOTE TITLE */
.note h3 {
    margin: 0 0 8px 0;
    font-size: 16px;
}

/* NOTE TEXT */
.note p {
    font-size: 14px;
    color: #4b5563;
}

/* DELETE BUTTON */
.danger {
    background: #ef4444;
    margin-top: 10px;
}

.danger:hover {
    background: #dc2626;
}

/* DIVIDER */
hr {
    margin: 15px 0;
    border: none;
    border-top: 1px solid #eee;
}

</style>
</head>

<body>

<div class="topbar">
    <h2>📝 EasyNotes</h2>

    <form method="POST" action="/logout">
        @csrf
        <button>Logout</button>
    </form>
</div>

<div class="layout">

    <div class="sidebar">

        <h3>Folders</h3>

        <form method="POST" action="/folders">
            @csrf
            <input name="name" placeholder="New folder">
            <button>Create</button>
        </form>

        <hr>

        <a class="folder" href="/notes">📁 All Notes</a>

        @foreach($folders as $folder)
            <a class="folder" href="/notes?folder_id={{ $folder->id }}">
                📁 {{ $folder->name }}
            </a>
        @endforeach

    </div>

    <div class="main">

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

        <div class="notes">

            @forelse($notes as $note)
                <div class="note">
                    <h3>{{ $note->title }}</h3>
                    <p>{{ $note->content }}</p>

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

</div>

</body>
</html>