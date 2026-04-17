<!DOCTYPE html>
<html>
<head>
    <title>Edit Note</title>

    <style>
        body {
            font-family: Arial;
            background: #f6f7fb;
            padding: 40px;
        }

        .box {
            max-width: 500px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 12px;
        }

        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        button {
            margin-top: 15px;
            background: #4f46e5;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>

<body>

<div class="box">

    <h2>Edit Note</h2>

    <form method="POST" action="/notes/update/{{ $note->id }}">
        @csrf

        <input name="title" value="{{ $note->title }}" required>

        <textarea name="content" required>{{ $note->content }}</textarea>

        <select name="folder_id">
            <option value="">No Folder</option>
            @foreach($folders as $folder)
                <option value="{{ $folder->id }}"
                    {{ $note->folder_id == $folder->id ? 'selected' : '' }}>
                    {{ $folder->name }}
                </option>
            @endforeach
        </select>

        <button>Update Note</button>
    </form>

    <a href="/notes">⬅ Back</a>

</div>

</body>
</html>