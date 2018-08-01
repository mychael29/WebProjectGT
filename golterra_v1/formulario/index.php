<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Aprendiendo PHP</title>
    <link href="https://fonts.googleapis.com/css?family=Proza+Libre" rel="stylesheet">

    <link rel="stylesheet" href="css/estilos.css" media="screen" title="no title">
  </head>
  <body>

    <div class="contenedor">
      <h1>Aprendiendo PHP</h1>

        <div class="contenido">

          <form class="" action="respuesta.php" method="post">

            <label>Nombre:</label>
            <input type="text" name="nombre" id="nombre">

            <br>

            <label>Apellido:</label>
            <input type="text" name="apellido" id="apellido">

            <br>

            <label>Cursos:</label>
            <br>
            <input type="checkbox" name="curso[]" value="Html5" id="Html5"> HTML5
            <br>
            <input type="checkbox" name="curso[]" value="Css3" id="Css3"> CSS3
            <br>
            <input type="checkbox" name="curso[]" value="Javascript" id="Javascript"> JavaScript

            <br>
            <label>Area de especializacion</label>
            <br>
            <select name="area" value="-Any-">
              <option value="fe">Front End</option>
              <option value="be">Back End</option>
              <option value="fs">Full Stack</option>
            </select>


            <br>
            <input type="submit" name="enviar" value="Enviar">

          </form>

        </div>
    </div>




  </body>
</html>
