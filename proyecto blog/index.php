<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h2>Nueva entrada</h2>
<form action="insertarContenido.php" method="post" enctype="multipart/form-data" name="form1">
<table>
  <tr>
    <td>Titulo:<label for="campoTitulo"></label></td>
    <td><input type="text" name="campoTitulo" id="campoTitulo"></td>
  </tr>
  <tr>
    <td>Cometarios: <label for="areaComentarios"></label></td>
    <td> <textarea name="areaComentarios" id="areaComentarios" cols="30" rows="10"></textarea> </td>
  </tr>
  <tr>
    <input type="hidden" name="MAX_TAM" value="2097152">
  </tr>
  <tr>
    <td></td>
    <td>Sleccione una imagen con tamano inferior a 2 MB</td>
  </tr>
  <tr>
  <td></td>
  <td> <input type="file" name="imagen" id="imagen"> </td>
  </tr>
  <tr>
  <td> <input type="submit" name="btnEnviar" id="btnEnviar" value="Enviar"> </td>
  <td> <a href="mostrarBlog.php">Pagina de Blog</a></td>
  </tr>      
</table>
</form>
</body>
</html>