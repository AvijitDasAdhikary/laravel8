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
    @switch($value)
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
    @for ($i = 0; $i < $value; $i++)
        <p>The current value is {{ $i }}</p>
    @endfor
    <hr>
    @foreach ($users as $user)
        <p>This is user {{ $user['id'] }}</p>
    @endforeach
    <hr>
    @forelse ($admins as $admin)
        <p>{{ $admin['name'] }}</p>
    @empty
        <p>Admin Present!!</p>
    @endforelse
    <hr>
    <div style="width:50%; float:left">
        <h4>1st Method</h4>
        @foreach ($users as $user)
            @if($user['id'] == 1)
                @continue
            @endif
            <p>{{ $user['code']}}</p>
            @if($user['age']== 62)
                @break
            @endif
        @endforeach
    </div>
    <div style="width:50%; float:left">
        <h4>2nd Method</h4>
        @foreach($users as $user)
            @continue($user['id'] ==3)
            <p>{{ $user['code'] }}</p>
            @break($user['age'] == 52)
        @endforeach    
    </div>
    <hr>
    <h4>Loop Variables</h4>
    <div style="width:100%; float:left">
        @foreach($users as $user)
        @if ($loop->first)
                This is first iteration
            @endif

            @if ($loop->last)
                This is last iteration
            @endif
            <p>This is user {{ $user['id'] }}</p>
        @endforeach
        <hr>
        @foreach ($users as $user)
            @foreach ($user as $u)
                @if ($loop->parent->first)
                    <p>This is first iteration of the parent loop</p>
                @endif
            @endforeach
        @endforeach
    </div>
    <hr>
    <div style="width:100%; float:left">
        @foreach($users as $user)
            @if($loop->first)
                <p>Total Number of items in the array is {{ $loop->count }}</p>
                <p>This is First iteration</p>
                <p>{{ $loop->remaining }} loops remaining</p>
            @endif

            @if($loop->index < 2)
                <p>The index of current loop is {{ $loop->index }}</p>
            @endif


        @endforeach
    </div>
    <hr>
    <h3>Sub Views</h3>
    @foreach($users as $user)
        @each('index',$user, 'user')
    @endforeach
    <hr>
</body>
</html>