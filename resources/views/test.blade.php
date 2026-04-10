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
        <input type="date" id="dat" name="dat" >
       
        
        <button type="submit">Calculate Age</button>
    </form>

    @if(isset($years) && isset($months) && isset($days))
        <h2>You are {{ $years }} years and {{ $months }} months {{$days}}  days old.</h2>
        @endif
    
</body>
</html> 