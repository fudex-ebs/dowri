<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <p>test qr
      <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(100)->generate('QrCode as PNG image!')) !!} ">
    </p>
  </body>
</html>
