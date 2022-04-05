
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
            
            $entidad = $anio = $titulo = $nombre = $apPaterno = $apMaterno = "";
            $obs = $anioSoli = $numSoli = $inventores = $resumen = $estado = "";
            $fechaPresentacion = "";
            $entidadErr = $tituloErr = $tituloErr = $nombreErr = $apPaternoErr = $apMaternoErr =  "";
            $anioSoliErr = $numSoliErr = $inventoresErr = $resumenErr = $estadoErr = "";
            $fechaPresentacionErr = "";

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                if (empty($_POST["entidad"])) {
                    $entidadErr = "Entidad es requerida";
                  } else {
                  $entidad = test_input($_POST["entidad"]);
                    if (! is_integer("entidad")) {
                        $entidadErr = "Unicamente se permiten números enteros.";
                    }
                } 
                
                $anio = $_POST["anio"];

                if (empty($_POST["titulo"])) {
                    $tituloErr = "Título es requerido";
                  } else {
                    $titulo = test_input($_POST["titulo"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$titulo)) {
                        $tituloErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }

                $nombre = test_input($_POST["nombre"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$nombre)) {
                    $nombreErr = "Unicamente se permiten letras y espacios en blanco.";
                }

                $apPaterno = test_input($_POST["apPaterno"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$apPaterno)) {
                    $apPaternoErr = "Unicamente se permiten letras y espacios en blanco.";
                }

                $apMaterno = test_input($_POST["apMaterno"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$apMaterno)) {
                    $apMaternoErr = "Unicamente se permiten letras y espacios en blanco.";
                }

                $obs = test_input($_POST["obs"]);

                if (empty($_POST["anioSoli"])) {
                    $anioSoliErr = "Año de solicitud es requerido";
                  } else {
                  $anioSoli = $_POST["anioSoli"];
                  }

                if (empty($_POST["numSoli"])) {
                    $numSoliErr = "Número de solicitud es requerido";
                  } else {
                    $numSoli = test_input($_POST["numSoli"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$numSoli)) {
                        $numSoliErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }
                
                if (empty($_POST["inventores"])) {
                    $inventoresErr = "Inventores es requerido";
                  } else {
                    $inventores = test_input($_POST["inventores"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$inventores)) {
                        $inventoresErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }

                if (empty($_POST["resumen"])) {
                    $resumenErr = "Resumen es requerido";
                  } else {
                    $resumen = test_input($_POST["resumen"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$resumen)) {
                        $resumenErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }

                if (empty($_POST["estado"])) {
                    $estadoErr = "Estado es requerido";
                  } else {
                    $estado = test_input($_POST["estado"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$estado)) {
                        $estadodErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }

                if (empty($_POST["fechaPresentacion"])) {
                    $fechaPresentacionErr = "Fecha de presentación es requerida";
                } else {
                  $fechaPresentacion = $_POST["fechaPresentacion"];
                }                  

                  
            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?> 
        
            <h2>Registro de patente solicitada</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

            <div class="form-group">
						
                        <div class="row">
                            <div class="col-sm-12">
        
                                <div class="row" style="margin-bottom:7px;">
                                    <div class="col-sm-2">
                                    <input type="hidden" name="entidad" />
                                            <label for="sel1">Entidad<span style="color:red;">*</span>:</label>
                                    </div>
                                    <div class="col-sm-4">
                                        <select class="form-control" name="entidad"> <?php echo $entidadErr;?>
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
                                            <label for="sel1">Año:</label>
                                        </div>
                                        <div class="col-sm-10">
                              <input type="date" name="anio">	
                                        </div>
                          </div> 
        
                        <div class="row" style="margin-top:7px;">
                            <div class="col-sm-2">
                                <label for="sel1">Título<span style="color:red;">*</span>:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="titulo" /> <?php echo $tituloErr;?>
                            </div>						
                        </div> 
        
                        <div class="row" style="margin-top:7px;">
                            <div class="col-sm-2">
                                <label for="sel1">Nombre:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nombre" />
                            </div>						
                        </div> 
        
                        <div class="row" style="margin-top:7px;">
                            <div class="col-sm-2">
                                <label for="sel1">Apellido paterno:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="apPaterno" />
                            </div>						
                        </div> 
        
                        <div class="row" style="margin-top:7px;">
                            <div class="col-sm-2">
                                <label for="sel1">Apellido materno:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="apMaterno" />
                            </div>						
                        </div> 
        
                        <div class="row" style="margin-top:7px;">
                            <div class="col-sm-2">
                                <label for="sel1">Observaciones:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="obs" />
                            </div>						
                        </div> 
        
                        <div class="row" style="margin-bottom:7px;">
                                      <div class="col-sm-2">
                                            <label for="sel1">Año de solicitud<span style="color:red;">*</span>:</label>
                                        </div>
                                        <div class="col-sm-10">
                              <input type="date" name="anioSoli"><span class="error">* <?php echo $anioSoliErr;?></span>	
                                        </div>
                          </div>
                          
                        <div class="row" style="margin-top:7px;">
                            <div class="col-sm-2">
                                <label for="sel1">Número de solicitud<span style="color:red;">*</span>:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="numSoli" /> <?php echo $numSoliErr;?>
                            </div>						
                        </div> 
                        
                        <div class="row" style="margin-top:7px;">
                            <div class="col-sm-2">
                                <label for="sel1">Inventores<span style="color:red;">*</span>:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="inventores" /> <?php echo $inventoresErr;?>
                            </div>						
                        </div> 
        
                        <div class="row" style="margin-top:7px;">
                            <div class="col-sm-2">
                                <label for="sel1">Resumen<span style="color:red;">*</span>:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="resumen" /> <?php echo $resumenErr;?>
                            </div>						
                        </div> 
        
                        <div class="row" style="margin-top:7px;">
                            <div class="col-sm-2">
                                <label for="sel1">Estado<span style="color:red;">*</span>:</label>
                            </div>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="estado" /> <?php echo $estadoErr;?>
                            </div>						
                        </div> 
        
                        <div class="row" style="margin-top:7px;">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-2">
                                        <label for="sel1">Fecha de presentación<span style="color:red;">*</span>:</label>
                                    </div>
                                    <div class="col-sm-10">
                                    <input type="date" class="form-control" name="fechaPresentacion"/> <?php echo $fechaPresentacionErr;?>
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