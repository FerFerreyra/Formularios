
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

                $convocatoria = $area = $nombre = $tipoParticipacion = "";
                $obs = $codigo = $inicio = $termino = "";
                $convocatoriaErr = $areaErr = $nombreErr = $tipoParticipacionErr = "";
                $obs = $codigoErr = $inicioErr = $terminoErr = "";

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty($_POST["convocatoria"])) {
                            $convocatoriaErr = "Convatoria es requerida";
                        } else {
                            $convocatoria = test_input($_POST["convocatoria"]);
                            if (!preg_match("/^[a-zA-Z-' ]*$/",$convocatoria)) {
                                $convocatoriaErr = "Unicamente se permiten letras y espacios en blanco.";
                            }
                        }
                }
                

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty($_POST["area"])) {
                            $areaErr = "Area es requerida";
                        } else {
                            $area = test_input($_POST["area"]);
                            if (!preg_match("/^[a-zA-Z-' ]*$/",$area)) {
                                $areaErr = "Unicamente se permiten letras y espacios en blanco.";
                            }
                        }
                }
                }

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty($_POST["nombre"])) {
                            $nombreErr = "Nombre es requerido";
                        } else {
                            $nombre = test_input($_POST["nombre"]);
                            if (!preg_match("/^[a-zA-Z-' ]*$/",$nombre)) {
                                $nombreErr = "Unicamente se permiten letras y espacios en blanco.";
                            }
                        }
                }
                }

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty($_POST["tipoParticipacion"])) {
                            $tipoParticipacionErr = "Tipo de partición es requerido";
                        } else {
                            $tipoParticipacion = test_input($_POST["tipoParticipacion"]);
                            if (!preg_match("/^[a-zA-Z-' ]*$/",$tipoParticipacion)) {
                                $tipoParticipacionErr = "Unicamente se permiten letras y espacios en blanco.";
                            }
                        }
                }
                }

                if (empty($_POST["inicio"])) {
                    $inicioErr = "Fecha de inicio es requerida";
                } else {
                $inicio = $_POST["inicio"];
                }
            
                $termino = $_POST["termino"];

                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if (empty($_POST["codigo"])) {
                            $codigoErr = "Código es requerido";
                        } else {
                            $codigo = test_input($_POST["codigo"]);
                            if (!preg_match("/^[a-zA-Z-' ]*$/",$codigo)) {
                                $codigoErr = "Unicamente se permiten letras y espacios en blanco.";
                            }
                        }
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
        
            <h2>Registro de Proyectos SISEPRO</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="form-group">

                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
					    <label for="sel1">Convocatoria<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="convocatoria" /> <?php echo $convocatoriaErr;?>
					</div>						
				</div> 	                        

                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
					    <label for="sel1">Area<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="area" /> <?php echo $areaErr;?>
					</div>						
				</div> 	     

                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
					    <label for="sel1">Nombre<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="nombre" /> <?php echo $nombreErr;?>
					</div>						
				</div> 
                
                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
					    <label for="sel1">Tipo de participación<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="tipoParticipacion" /> <?php echo $tipoParticipacionErr;?>
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

                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
					    <label for="sel1">Código<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="codigo" /> <?php echo $codigoErr;?>
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