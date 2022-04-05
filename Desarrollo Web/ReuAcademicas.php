
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
            
            $tipoEvento = $nomEvento = $pais = $ciudad = "";
            $inicio = $termino = $obs = "";
            $tipoEventoErr = $nomEventoErr = $paisErr = $ciudadErr = "";
            $inicioErr = $terminoErr = $obsErr = "";

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                if (empty($_POST["tipoEvento"])) {
                    $tipoEvento = "Tipo de evento es requerido";
                  } else {
                    $tipoEvento = test_input($_POST["tipoEvento"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$tipoEvento)) {
                        $tipoEvento = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }
                
                if (empty($_POST["nomEvento"])) {
                    $nomEventoErr = "Nombre del evento es requerido";
                  } else {
                    $nomEvento = test_input($_POST["nomEvento"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$nomEvento)) {
                        $nomEventoErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }

                if (empty($_POST["pais"])) {
                    $paisErr = "Pais es requerido";
                  } else {
                    $pais = test_input($_POST["pais"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$pais)) {
                        $paisErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }

                if (empty($_POST["ciudad"])) {
                    $ciudadErr = "Facultad es requerido";
                  } else {
                    $ciudad = test_input($_POST["ciudad"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$ciudad)) {
                        $ciudadErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }
                if (empty($_POST["inicio"])) {
                    $inicioErr = "Fecha de inicio es requerida";
                  } else {
                  $inicio = $_POST["inicio"];
                  }
            
                $termino = $_POST["termino"];
                

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
        
            <h2>Registro de reuniones académicas</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="form-group">

                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
        			    <label for="sel1">Tipo de evento<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="tipoEvento" /> <?php echo $tipoEventoErr;?>
					</div>						
				</div> 

                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
        			    <label for="sel1">Nombre del evento<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="nomEvento" /> <?php echo $nomEventoErr;?>
					</div>						
				</div> 
						
                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
        			    <label for="sel1">País<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="pais" /> <?php echo $paisErr;?>
					</div>						
				</div> 
                        
                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
        			    <label for="sel1">Ciudad<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="ciudad" /> <?php echo $ciudadErr;?>
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