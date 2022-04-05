
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
            
            $programa = $tema = $fecha = $obs = "";
            $programaErr = $temaErr = $fechaErr = $obs = "";

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                
                if (empty($_POST["programa"])) {
                    $programaErr = "Nombre del programa es requerido";
                  } else {
                  $programa = test_input($_POST["programa"]);
                  if (!preg_match("/^[a-zA-Z-' ]*$/",$programa)) {
                    $programaErr = "Unicamente se permiten letras y espacios en blanco.";
                }
                }

                if (empty($_POST["tema"])) {
                    $temaErr = "Teme es requerido";
                  } else {
                  $tema = test_input($_POST["tema"]);
                  if (!preg_match("/^[a-zA-Z-' ]*$/",$tema)) {
                    $temaErr = "Unicamente se permiten letras y espacios en blanco.";
                }
                }
                
                if (empty($_POST["fecha"])) {
                    $fechaErr = "Fecha es requerida";
                } else {
                  $fecha = $_POST["fecha"];
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
        
            <h2>Registro de programa de TV y radio</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="form-group">
						
                <div class="row" style="margin-top:7px;">
									<div class="col-sm-2">
									  <label for="sel1">Nombre del programa<span style="color:red;">*</span>:</label>
									</div>
									<div class="col-sm-10">
                                        <input type="text" class="form-control" name="programa" /> <?php echo $programaErr;?>
									</div>						
								</div> 

                <div class="row" style="margin-top:7px;">
									<div class="col-sm-2">
									  <label for="sel1">Tema del programa<span style="color:red;">*</span>:</label>
									</div>
									<div class="col-sm-10">
                                        <input type="text" class="form-control" name="tema" /> <?php echo $temaErr;?>
									</div>						
				</div> 

                <div class="row" style="margin-top:7px;">
					<div class="col-sm-12">
						<div class="row">
							<div class="col-sm-2">
								<label for="sel1">Fecha <span style="color:red;">*</span>:</label>
							</div>
						    <div class="col-sm-10">
							<input type="date" class="form-control" name="fecha"/> <?php echo $fechaErr;?>
						    </div>	
					    </div>
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