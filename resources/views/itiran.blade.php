<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <body>

    <h1>イベント一覧</h1>
        <div class='schedules'>
        @foreach ($schedules as $schedule)
            <div class='schedule'>
                <h2 class='title'>{{ $schedule->title }}</h2>
                <p class='start'>{{ $schedule->start}}</p>
                <p class='end'>{{ $schedule->end}}</p>
                @foreach ($schedule->users as $user)
                {{ $user->name}}
                @endforeach
            <a href="/schedules/sankasya/{{ $schedule->id }}">参加者登録</a>
            </div>
        @endforeach
        </div>
    <a href='/'>カレンダーに戻る</a>    
  </body>
</html>        