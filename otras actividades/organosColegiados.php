
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
            
            $miembro = $inicio = $termino = $obs = "";
            $miembroErr = $inicioErr = $obsErr = "";    

            if($_SERVER["REQUEST_METHOD"] == "POST"){

                $miembro = test_input($_POST["miembro"]);
                if (!preg_match("/^[a-zA-Z-' ]*$/",$miembro)) {
                    $miembroErr = "Unicamente se permiten letras y espacios en blanco.";
                }

                if (empty($_POST["inicio"])) {
                    $inicioErr = "Fecha de inicio es requerida";
                } else {
                  $fechaPresentacionErr = $_POST["inicio"];
                }

                $termino = $_POST["termino"];

            }

            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?> 
        
            <h2>Registro de órganos colegiados</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="form-group">
						
                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
        			    <label for="sel1">Miembro:<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="miembro" /> <?php echo $miembroErr;?>
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