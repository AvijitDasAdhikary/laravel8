<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>
    <h1 style="text-align:center">Hello Laravel</h1>

    @if (count($records1) === 1)
        <p>I have one record!</p>
    @elseif (count($records1) > 1)
        <p>I have multiple records!</p>
    @else   
        <p>I don't have any records!</p>
    @endif
    <hr>
    @empty($records2)
        records doesn't exixts!
    @endempty
    <hr>
    @switch($i)
        @case(1)
            First Case...
            @break

        @case(2)
            Second Case...
            @break
        
        @default
            Default Case...
    @endswitch
    <hr>
    @for ($i = 0; $i < 1; $i++)
        The current value is {{ $i }}
    @endfor
    <hr>
    @foreach($users as $user)
        <p>This is user {{ $user->id }}</p>
    @endforeach
    
</body>
</html>