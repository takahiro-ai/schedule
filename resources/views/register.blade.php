<!DOCTYPE HTML>
<html lang="{{ str_replace("_", "-", app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="/css/app.css">
    </head>
    <body>
        <h1 class="title">
                    {{ $schedule->title }}
        </h1>
        <form action="/store/{{$schedule->id}}" method="POST">
            @csrf
            <h2>参加者</h2>
            @foreach($users as $user)
                <label>
                    <input type="checkbox" value="{{ $user->id }}" name="users_array[]">
                        {{$user->name}}
                    </input>
                </label>
                    
            @endforeach         
        
            <input type="submit" value="保存"/>
        </form>
        
    </body>
</html>

