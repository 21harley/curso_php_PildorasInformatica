<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir Archivo</title>
</head>
<body>
    <form action="subir.php" method="post" enctype="multipart/form-data">
      <table>
      <tr>
      <td> <label for="archivo">Archivo:</label> </td>
      <td> <input type="file" name="archivo" size="20"> </td>
      </tr>
      <tr>
      <td colspan="2"> <input type="submit" value="Enviar"></td>
      </tr>
      </table>
    </form>
</body>
</html>