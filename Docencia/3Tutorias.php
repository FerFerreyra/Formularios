
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
            $universidad = $programa = $nivel =  $numAlumnos = "";
            $tipoTutoria = $observaciones = "";
            $universidadErr = $programaErr = $nivelErr =  $numAlumnosErr = "";
            $tipoTutoriaErr = $observacionesErr = "";
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                if (empty($_POST["universidad"])) {
                    $universidadErr = "Universidad es requerida";
                  } else {
                  $universidad = test_input($_POST["universidad"]);
                    if (! is_integer("universidad")) {
                        $universidadErr = "Unicamente se permiten números enteros.";
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

                if (empty($_POST["programa"])) {
                    $programaErr = "Programa es requerido";
                  } else {
                    //verificar el dato tenga las especificaciones adecuadas
                    $programa = test_input($_POST["programa"]);
                    if (!preg_match("/^[a-zA-Z0-9.]+$/",$programa)) {
                        $programaErr = "Unicamente se permiten letras, números y espacios en blanco.";
                    }
                }
                                
                if (empty($_POST["numAlumnos"])) {
                    $numAlumnosErr = "Número de alumnos es requerid0";
                  } else {
                  $numAlumnos = test_input($_POST["numAlumnos"]);
                    if (! is_int("numAlumnos")) {
                        $numAlumnosErr = "Unicamente se permiten números.";
                    }
                }
                
                if (empty($_POST["tipoTutoria"])) {
                    $tipoTutoria = ">Tipo de tutoría es requerido";
                  } else {
                    //verificar el dato tenga las especificaciones adecuadas
                    $tipoTutoria = test_input($_POST["tipoTutoria"]);
                    if (!preg_match("/^[a-zA-Z0-9.]+$/",$tipoTutoria)) {
                        $tipoTutoriaErr = "Unicamente se permiten letras, números y espacios en blanco.";
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
        
            <h2>Registro de tutorías</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="form-group">
						
                        <div class="row">
                            <div class="col-sm-12">
                            
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
                              
                            <div class="row" style="margin-top:7px;">
                                <div class="col-sm-2">
                                <label for="sel1">Nombre del programa<span style="color:red;">*</span>:</label>
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="programa" /><?php echo $programaErr;?>
                                </div>        
                            </div>

                            <div class="row" style="margin-bottom:7px;">
                            <div class="col-sm-2">
                            <input type="hidden" name="numAlumnos" />
                                    <label for="sel1">Número de alumnos<span style="color:red;">*</span>:</label>
                                </div>
                                <div class="col-sm-4">
                                    <select class="form-control" name="numAlumnos"> <?php echo $numAlumnosErr;?>
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
                                <label for="sel1">Tipo de tutoría<span style="color:red;">*</span>:</label>
                                
                                </div>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="tipoTutoria" /><?php echo $tipoTutoriaErr;?>
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
                        </div>
                </div>
                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary my-1">Agregar</button>
                </div>
            </form>
            
        </body>    
    </html>