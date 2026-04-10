 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Age</title>
</head>
<body>
    <form action="/test" method="POST">
        @csrf
        <label for="dat">Birth Date:</label>
        <input type="date" id="dat" name="dat" required value="{{ old('dat') }}">
        @error('dat')
            <div style="color: red;">{{ $message }}</div>
        @enderror
        
        <button type="submit">Calculate Age</button>
    </form>

    @if(isset($years) && isset($months))
        <h2>You are {{ $years }} years and {{ $months }} months old.</h2>
    @endif
</body>
</html> 