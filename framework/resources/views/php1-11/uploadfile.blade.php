<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Upload file</title>
  </head>
  <body>
    
    <form  action="./upload-file" method="post" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{csrf_token()}}">
      <input type="file" name="file">
      <input type="submit" value="Upload">
    </form>
  </body>
</html>
