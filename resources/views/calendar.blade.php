<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <body>
    <a href='/schedules/itiran'>イベント一覧</a>
    <div>
      <div id="calendar"></div>
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
  </body>
</html>