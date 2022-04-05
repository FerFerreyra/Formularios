
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
                $titulo = $entidad = $numProyecto = $anio = $camConocim = "";
                $disciplina = $monto = $obs = "";
                $tituloErr = $entidadErr = $numProyectoErr = $anioErr = $camConocimErr = "";
                $disciplinaErr = $montoErr = $obs = "";
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    
                    if (empty($_POST["titulo"])) {
                        $tituloErr = "Título es requerido";
                    } else {
                        $titulo = test_input($_POST["titulo"]);
                        if (!preg_match("/^[a-zA-Z-' ]*$/",$titulo)) {
                            $tituloErr = "Unicamente se permiten letras y espacios en blanco.";
                        }
                    }

                    if (empty($_POST["entidad"])) {
                        $entidadErr = "Entidad es requerida";
                    } else {
                    $entidadErr = test_input($_POST["entidad"]);
                        if (! is_int("entidad")) {
                            $entidadErr = "Unicamente se permiten números enteros.";
                        }
                    }

                    if (empty($_POST["numProyecto"])) {
                        $numProyectoErr = "Num de proyecto es requerido";
                    } else {
                        $numProyecto = test_input($_POST["numProyecto"]);
                        if (!preg_match("/^[a-zA-Z-' ]*$/",$numProyecto)) {
                            $numProyectoErr = "Unicamente se permiten letras y espacios en blanco.";
                        }
                    }

                    if (empty($_POST["anio"])) {
                        $anio = "Año es requerido";
                    } else {
                    $anioErr = test_input($_POST["anio"]);
                        if (! is_int("anio")) {
                            $anioErr = "Unicamente se permiten números enteros.";
                        }
                    }

                    if (empty($_POST["camConocim"])) {
                        $camConocimErr = "Campo de conocimiento es requerido";
                    } else {
                        $camConocim = test_input($_POST["camConocim"]);
                        if (!preg_match("/^[a-zA-Z-' ]*$/",$camConocim)) {
                            $camConocimErr = "Unicamente se permiten letras y espacios en blanco.";
                        }
                    }

                    if (empty($_POST["disciplina"])) {
                        $disciplinaErr = "Disciplina es requerida";
                    } else {
                        $disciplina = test_input($_POST["disciplina"]);
                        if (!preg_match("/^[a-zA-Z-' ]*$/",$disciplina)) {
                            $disciplinaErr = "Unicamente se permiten letras y espacios en blanco.";
                        }
                    }

                    if (empty($_POST["monto"])) {
                        $montoErr = "Monto es requerido";
                    } else {
                    $montoErr = test_input($_POST["monto"]);
                        if (! is_float("monto")) {
                            $montoErr = "Unicamente se permiten números.";
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
        
            <h2>Registro de redes Conacyt</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="form-group">

                                <div class="row" style="margin-top:7px;">
									<div class="col-sm-2">
									  <label for="sel1">Título<span style="color:red;">*</span>:</label>
									</div>
									<div class="col-sm-10">
                                        <input type="text" class="form-control" name="titulo" /> <?php echo $tituloErr;?>
									</div>						
								</div> 

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

                                <div class="row" style="margin-top:7px;">
									<div class="col-sm-2">
									  <label for="sel1">Num de proyecto<span style="color:red;">*</span>:</label>
									</div>
									<div class="col-sm-10">
                                        <input type="text" class="form-control" name="numProyecto" /> <?php echo $numProyectoErr;?>
									</div>						
								</div>

                                <div class="row" style="margin-top:7px;">
									<div class="col-sm-2">
									  <label for="sel1">Año<span style="color:red;">*</span>:</label>
									</div>
									<div class="col-sm-10">
                                        <input type="int" class="form-control" name="anio" /><?php echo $anioErr;?>
									</div>						
							    </div>

                                <div class="row" style="margin-top:7px;">
									<div class="col-sm-2">
									  <label for="sel1">Campo de conocimiento<span style="color:red;">*</span>:</label>
									</div>
									<div class="col-sm-10">
                                        <input type="text" class="form-control" name="camConocim" /> <?php echo $camConocimErr;?>
									</div>						
								</div>

                                <div class="row" style="margin-top:7px;">
									<div class="col-sm-2">
									  <label for="sel1">Disciplina<span style="color:red;">*</span>:</label>
									</div>
									<div class="col-sm-10">
                                        <input type="text" class="form-control" name="disciplina" /> <?php echo $disciplinaErr;?>
									</div>						
								</div>

                                <div class="row" style="margin-top:7px;">
									<div class="col-sm-2">
									  <label for="sel1">Monto<span style="color:red;">*</span>:</label>
									</div>
									<div class="col-sm-10">
                                        <input type="float" class="form-control" name="monto" /><?php echo $montoErr;?>
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
                        

                <div class="col-sm-10">
                <button type="submit" class="btn btn-primary my-1">Agregar</button>
                </div>
            </form>
            
        </body>    
    </html>