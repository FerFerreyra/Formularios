<!DOCTYPE HTML>  
<html>
<head>
  <style>
      .error {color: #FF0000;}      
  </style>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>

<?php

  $tipoActividad = $nombreActividad = $obs = $inicio = $termino = "";
  $nomAlumno = $nivel = $obs = $universidad = $carrera = "";
  $semestre = $horas = "";
  $tipoActividadErr = $nombreActividadErr = $obs = $inicioErr = $terminoErr = "";
  $nomAlumnoErr = $nivelErr = $universidadErr = $carreraErr = "";
  $semestreErr = $horasErr = "";

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["tipoActividad"])) {
            $tipoActividadErr = "Tipo de actividad es requerido";
        } else {
            $tipoActividad = test_input($_POST["tipoActividad"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$tipoActividad)) {
                $tipoActividadErr = "Unicamente se permiten letras y espacios en blanco.";
            }
        }
    
        if (empty($_POST["nombreActividad"])) {
            $nombreActividadErr = "Nombre de actividad es requerido";
        } else {
        $nombreActividad = test_input($_POST["nombreActividad"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$nombreActividad)) {
                $nombreActividadErr = "Unicamente se permiten letras y espacios en blanco.";
            }
        }

        if (empty($_POST["nomAlumno"])) {
            $nomAlumnoErr = "Nombre del alumno es requerido";
        } else {
        $nomAlumno = test_input($_POST["nomAlumno"]);
            if (!preg_match("/^[a-zA-Z-' ]*$/",$nomAlumno)) {
                $nomAlumnoErr = "Unicamente se permiten letras y espacios en blanco.";
            }
        }

        if (empty($_POST["nivel"])) {
            $nivelErr = "Nivel es requerido";
          } else {
          $nivel = test_input($_POST["nivel"]);
            if (! is_int("nivel")) {
                $nivel = "Unicamente se permiten números enteros.";
            }
        }

        if (empty($_POST["universidad"])) {
            $universidadErr = "Universidad es requerida";
          } else {
          $universidad = test_input($_POST["universidad"]);
            if (! is_integer("universidad")) {
                $universidadErr = "Unicamente se permiten números enteros.";
            }
        }

        if (empty($_POST["carrera"])) {
            $carreraErr = "Carrera es requerida";
          } else {
          $carreraErr = test_input($_POST["carrera"]);
            if (! is_integer("carrera")) {
                $carreraErr = "Unicamente se permiten números enteros.";
            }
        }

        if (empty($_POST["semestre"])) {
            $semestreErr = "Semestre/año es requerido";
          } else {
            //verificar el dato tenga las especificaciones adecuadas
            $semestre = test_input($_POST["semestre"]);
            if (!preg_match("/^[a-zA-Z0-9.]+$/",$semestre)) {
                $semestreErr = "Unicamente se permiten letras, números y espacios en blanco.";
            }
        }

      if (empty($_POST["inicio"])) {
        $inicioErr = "Fecha de inicio es requerida";
      } else {
      $inicio = $_POST["inicio"];
      }

      if (empty($_POST["termino"])) {
        $terminoErr = "Fecha de termino es requerida";
      } else {
      $termino = $_POST["termino"];
      }

      if (empty($_POST["horas"])) {
        $horasErr = "Número de horas es requerido";
      } else {
      $horas = test_input($_POST["horas"]);
        if (! is_int("horas")) {
            $horasErr = "Unicamente se permiten números enteros.";
        }
    }

      if (empty($_POST["obs"])) {
        $obs = "";
      } else {
        $obs = test_input($_POST["obs"]);
      }
    }

    function test_input($data) {
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }
?>

<p><span class="error">* Campo requerido</span></p>
<h2>Registro de formación en la investigación</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <div class="form-group">
						
        <div class="row">
           <div class="col-sm-12">
                            
           <div class="row" style="margin-top:7px;">
                                <div class="col-sm-2">
                                <label for="sel1">Tipo de actividad<span style="color:red;">*</span>:</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tipoActividad" /><?php echo $tipoActividadErr;?>
                                </div>        
         </div>
         
        <div class="row" style="margin-top:7px;">
                                <div class="col-sm-2">
                                <label for="sel1">Nombre de la actividad<span style="color:red;">*</span>:</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nombreActividad" /><?php echo $nombreActividadErr;?>
                                </div>        
        </div>

        <div class="row" style="margin-top:7px;">
                                <div class="col-sm-2">
                                <label for="sel1">Nombre del alumno<span style="color:red;">*</span>:</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nomAlumno" /><?php echo $nomAlumnoErr;?>
                                </div>        
         </div>

         <div class="row" style="margin-bottom:7px;">
            <div class="col-sm-2">
                <input type="hidden" name="nivel" />
                <label for="sel1">Nivel<span style="color:red;">*</span>:</label>
            </div>
            <div class="col-sm-4">
                <select class="form-control" name="nivel"> <?php echo $nivelErr;?>
                    <option value="0">Seleccionar</option>
                    <option value="1">1</option>
                    <option value="9">Otro</option>
                </select>
            </div>
            <div class="col-sm-1">
                <label for="sel1">Otro:</label>
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="otro1" id="otro1" disabled />
            </div>
        </div>

        <div class="row" style="margin-bottom:7px;">
            <div class="col-sm-2">
                <input type="hidden" name="universidad" />
                <label for="sel1">Universidad<span style="color:red;">*</span>:</label>
            </div>
            <div class="col-sm-4">
                <select class="form-control" name="universidad"> <?php echo $universidadErr;?>
                    <option value="0">Seleccionar</option>
                    <option value="1">UNAM</option>
                    <option value="9">Otro</option>
                </select>
            </div>
            <div class="col-sm-1">
                <label for="sel1">Otro:</label>
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="otro1" id="otro1" disabled />
            </div>
        </div>

        <div class="row" style="margin-bottom:7px;">
            <div class="col-sm-2">
                <input type="hidden" name="carrera" />
                <label for="sel1">Carrera<span style="color:red;">*</span>:</label>
            </div>
            <div class="col-sm-4">
                <select class="form-control" name="carrera"> <?php echo $carreraErr;?>
                    <option value="0">Seleccionar</option>
                    <option value="1">Matemáticas</option>
                    <option value="9">Otro</option>
                </select>
            </div>
            <div class="col-sm-1">
                <label for="sel1">Otro:</label>
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="otro1" id="otro1" disabled />
            </div>
        </div>

        <div class="row" style="margin-top:7px;">
            <div class="col-sm-2">
                <label for="sel1">Año/Semestre<span style="color:red;">*</span>:</label>
            </div>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="semestre" /><?php echo $semestreErr;?>
            </div>
        </div>

    
        <div class="row" style="margin-bottom:7px;">
            <div class="col-sm-2">
                <label for="sel1">Fecha inicio<span style="color:red;">*</span>:</label>
            </div>
            <div class="col-sm-4">								
                <input type="date" class="form-control" name="inicio"  /> <?php echo $inicioErr;?> 		
            </div>
            <div class="col-sm-1">
                <label for="sel1">Fecha fin<span style="color:red;">*</span>:</label>
            </div>
            <div class="col-sm-5">
            <input type="date" class="form-control" name="termino"  /> <?php echo $terminoErr;?>
            </div>							
	    </div>
				

        <div class="row" style="margin-bottom:7px;">
            <div class="col-sm-2">
                <input type="hidden" name="horas" />
                <label for="sel1">Número de horas<span style="color:red;">*</span>:</label>
            </div>
            <div class="col-sm-4">
                <select class="form-control" name="horas"> <?php echo $horasErr;?>
                    <option value="0">Seleccionar</option>
                    <option value="1">1</option>
                    <option value="9">Otro</option>
                </select>
            </div>
            <div class="col-sm-1">
                <label for="sel1">Otro:</label>
            </div>
            <div class="col-sm-5">
                <input type="text" class="form-control" name="otro1" id="otro1" disabled />
            </div>
        </div>
								
								
        <div class="row" style="margin-top:7px;">
            <div class="col-sm-2">
                <label for="sel1">Observaciones:</label>
            </div>
            <div class="col-sm-10">
                <textarea name="obs" class="form-control" cols="40"></textarea>
            </div>
        </div>
        
    <button type="submit" class="btn btn-primary my-1">Submit</button>
</form>



</body>
</html>