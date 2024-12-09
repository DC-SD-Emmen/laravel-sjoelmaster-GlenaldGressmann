<!DOCTYPE html>
<html>
<head>
    <title>Score Form</title>
</head>
<body>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('scores.store') }}" method="POST">
    @csrf
    <label for="player">Speler:</label>
    <input type="text" id="player" name="player" value="{{ old('player') }}" required>
    
    <label for="score">Score:</label>
    <input type="number" id="score" name="score" value="{{ old('score') }}" required>
    
    <button type="submit">Opslaan</button>
</form>

</body>
</html>