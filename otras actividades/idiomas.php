
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
            
            $idioma = $nativo = $nivel = $certificado = $obs = "";
            $idiomaErr = $nativoErr = $nivelErr = $obs = "";

            if($_SERVER["REQUEST_METHOD"] == "POST"){

                if (empty($_POST["idioma"])) {
                    $idiomaErr = "Idioma es requerido";
                  } else {
                    $idioma = test_input($_POST["idioma"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$idioma)) {
                        $idiomaErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }

                if (empty($_POST["nativo"])) {
                    $nativoErr = "Este campo es requerido";
                  } else {
                    $invitacion = $_POST["invitacion"];
                  }

                if (empty($_POST["nivel"])) {
                    $nivelErr = "Nivel es requerido";
                  } else {
                    $nivel = test_input($_POST["nivel"]);
                    if (!preg_match("/^[a-zA-Z-' ]*$/",$nivel)) {
                        $nivelErr = "Unicamente se permiten letras y espacios en blanco.";
                    }
                }


                $certificado = test_input($_POST["certificado"]);

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
        
            <h2>Registro de idioma</h2>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

                <div class="form-group">
						
                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
        			    <label for="sel1">Idioma<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="idioma" /> <?php echo $idiomaErr;?>
					</div>						
				</div> 

                <div class="row" style="margin-bottom:7px;">
                            <div class="col-sm-2">
                                <input type="hidden" name="invitacion" />
                                    <label for="sel1">Nativo<span style="color:red;">*</span>:</label>
                            </div>
                                <div class="col-sm-10">
                                    <select class="form-control" name="nativo"> <?php echo $nativoErr;?>
                                        <option value="2">Seleccionar</option>
                                        <option value="0">No</option>
                                        <option value="1">Sí</option>
                                    </select>
                                </div>
                </div>

                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
        			    <label for="sel1">Nivel<span style="color:red;">*</span>:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="nivel" /> <?php echo $nivelErr;?>
					</div>						
				</div> 

                <div class="row" style="margin-top:7px;">
					<div class="col-sm-2">
        			    <label for="sel1">Certificado:</label>
					</div>
					<div class="col-sm-10">
                        <input type="text" class="form-control" name="certificado" />
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