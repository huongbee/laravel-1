<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Middleware</title>
  </head>
  <body>
    <form class="" action="{{route('kiem-tra-middleware')}}" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="text" name="tuoi">
      <input type="submit" value="gửi">
    </form>
  </body>
</html>
