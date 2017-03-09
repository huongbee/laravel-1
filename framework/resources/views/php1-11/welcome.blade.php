<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Form</title>
  </head>
  <body>
    <form  action="{{route('postform')}}" method="post">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="text" name="hoten" value="">
      <input type="text" name="tuoi" value="">
      <button type="submit" name="button">Gửi</button>
    </form>
  </body>
</html>
