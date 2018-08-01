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

          <?php $resultado = $_POST;  ?>

          <p>Nombre: <?php echo $resultado['nombre'];?></p>
          <p>Apellido: <?php echo $resultado['apellido'];?></p>

          <?php //validar checkboxes ?>

          <?php
          if(isset($_POST['curso'])){
            $cursos = $_POST['curso'];

            echo "Cursos:</br>";
            foreach ($cursos as $curso) {
              echo $curso . '</br>';
            }

          }else{
            echo "no elegiste cursos";
          }
           ?>

           <?php  //validar select?>
           <?php
           if(isset($_POST['area'])) {

             $area = $_POST['area'];
             echo "Area de especializacion: ";

             switch ($area) {
               case 'fe':
                   echo "Front End";
                 break;

               case 'be':
                 echo "Back End";
                 break;

                case 'fs':
                echo "Full Stack";
                break;

                default:
                  echo "Por favor elige una area";
                  break;
             }

           }
           ?>

        </div>
    </div>


  </body>
</html>
