<?php

class ConnectionDB {
    
    private $host = 'localhost';
    private $user = 'emilioheras';
    private $password = '';
    private $db = 'jugadores';
    private $connection;
    
    /*Construtor de la clase ConnectionDB. Crea una conexión con la bd*/
    public function __construct(){
        $this->connection = new mysqli($this->host, $this->user, $this->password, $this->db);
    }
    
    
    /*Función que comprueba si el usuario ya existía en la bd.*/
    public function checkConnection(){
        
        if ($this->connection->connect_errno){
            //printf("Falló la conexión: %s\n", $this->connection->connect_error);
            return "fail";
            exit();
            $this->connection->close();
        }else{
            //Si la conexión a la bd es correcta, devolvemos un ok para seguir con la ejecución del programa.
            return "ok";
        }
    }
    
    
    /*Función que comprueba si el usuario ya existía en la bd.*/
    public function checkPlayer($name, $lastName, $age){
        $query = "SELECT * FROM jugador WHERE nombre='$name' AND apellido='$lastName'";
        //Comprobamos si la consulta devuelve algo (siempre lo hace, aunque sea 0).
        if ($result = $this->connection->query($query)){
            //Si el resultado no devuelve un número de filas != 0... el jugador ya estaba en la BD.
            if ($result->num_rows != 0){
                //Recogemos el resultado (en este caso la fila) en un array.
                $data = $result->fetch_assoc();
                $this->showMessage('welcomePlayer', $data, null);
            }else{
                //Si la consulta devuelve una fila (número de filas = 0). Registramos el nuevo jugador en la BD.
                $this->insertNewPlayer($name, $lastName, $age, 0);
            }
        }
        //liberar el conjunto de resultados.
        $result->close();
        $this->connection->close();
    }
    
    
     /*Función que inserta un nuevo usuario en la bd y muestra una ventana modal indicándolo.*/
    public function insertNewPlayer($name, $lastName, $age, $score){
        $query = "INSERT INTO jugador (ID, nombre, apellido, edad, puntos) VALUES ('null', '$name', '$lastName', '$age', '$score')";
        
        if ($this->connection->query($query) === TRUE) {
            $this->showMessage('newPlayer', $name, null);
        }
    }
    
    
    /*Función que inserta la puntuación obtenida por el usuario en la bd.*/
    public function insertScore($name, $lastName, $score){
        $query = "UPDATE jugador SET puntos='$score' WHERE nombre='$name' AND apellido='$lastName'";
        $this->connection->query($query);
        $this->connection->close();
    }
    
    
    /*Función que modifica (actualiza) los nuevos datos personales proporcionados por el usuario en la bd.*/
    public function modifyDataPlayer($oldName, $oldLastName, $newName, $newLastName, $newAge){
        $query1 = "SELECT * FROM jugador WHERE nombre='$oldName' AND apellido='$oldLastName'";
        
        if ($result1 = $this->connection->query($query1)){
            //Guardamos los datos antiguos del jugador (los extraemos de la bd).
            $oldData = $result1->fetch_assoc();
            $id = $oldData['ID'];
            $result1->close();
        }
        
        $query2 = "UPDATE jugador SET nombre='$newName', apellido='$newLastName', edad='$newAge' WHERE ID='$id'";
        $this->connection->query($query2);
        
        
        $query3 = "SELECT * FROM jugador WHERE nombre='$newName' AND apellido='$newLastName'";
        if ($result2 = $this->connection->query($query3)){
            //Guardamos los datos nuevos del jugador (los extraemos de la bd).
            $newData = $result2->fetch_assoc();
            $result2->close();
        }
        
        $this->showMessage("updatePlayer", $oldData, $newData);
        $this->connection->close();
    }
    
    
    // GETTERS && SETTERS.
    
    public function getConnection(){
        return $this->connection;
    }
    
    public function getHost(){
        return $this->host;
    }
    
    public function getUser(){
        return $this->user;
    }
    
    public function getPassword(){
        return $this->password;
    }
    
    public function getDb(){
        return $this->db;
    }
    
    public function setConnection($newConnection){
        $this->connection = $newConnection;
    }
    
    public function setHost($newHost){
        $this->host = $newHost;
    }
    
    public function setUser($newUser){
        $this->user = $newUser;
    }
    public function setPassword($newPassword){
        $this->password = $newPassword;
    }
    
    public function setDb($newDb){
        $this->db = $newDb;
    }
    
    
    
    /*Función que muestra las ventanas modales con los mensajes correspondientes a las acciones realizadas*/
    public function showMessage($string, $userData1, $userData2){
        
        echo "<script type='text/javascript'>showModal = true;</script>";
        
        switch($string){
            //Ventana modal para caso de error en la conexión con la BD.
            case "connect":
                echo "<div class='modal fade' tabindex='-1' role='dialog' id='windowMessage'>
                	  <div class='modal-dialog'>
                	    <div class='modal-content'>
                	      <div class='modal-header'>
                	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                	        <h2 class='modal-title'>¡¡ ERROR DE CONEXIÓN !!</h2>
                	      </div>
                	      <div class='modal-body'>
                	        <p class='lead text-center'>Ha habido un problema al intentar conectar con Math Dice.</p>
                	      </div>
                	      <div class='modal-footer'>
                	        <button type='button' class='btn btn-danger' data-dismiss='modal'>De acuerdo</button>	        
                	      </div>
                	    </div><!-- /.modal-content -->
                	  </div><!-- /.modal-dialog -->
                	</div><!-- /.modal -->";
                break;
            //Ventana modal para caso de inserción de un nuevo jugador en la BD.
            case "newPlayer":
                echo "<div class='modal fade' tabindex='-1' role='dialog' id='windowMessage'>
                	  <div class='modal-dialog'>
                	    <div class='modal-content'>
                	      <div class='modal-header'>
                	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                	        <h2 class='text-center'><img src='./img/smileB.png'><br><br>¡¡Hola ".$userData1."!!</h2>
                	      </div>
                	      <div class='modal-body'>
                	        <p class='lead text-center'>Se ha creado una nueva cuenta con tus datos.</p>
                	        <p class='lead text-center'>Vamos a divertirnos un rato jugando con Math Dice.</p>
                	      </div>
                	      <div class='modal-footer'>
                	        <button type='button' class='btn btn-info' data-dismiss='modal'>A jugar</button>	        
                	      </div>
                	    </div><!-- /.modal-content -->
                	  </div><!-- /.modal-dialog -->
                	</div><!-- /.modal -->";
                break;
            //Ventana modal para caso de que el jugador ya exista en la BD.   
            case "welcomePlayer":
                echo "<div class='modal fade' tabindex='-1' role='dialog' id='windowMessage'>
                	  <div class='modal-dialog'>
                	    <div class='modal-content'>
                	      <div class='modal-header'>
                	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                	        <h2 class='text-center'><img src='./img/smileG.png'><br><br>¡¡Hola de nuevo ".$userData1['nombre']."!!</h2>
                	      </div>
                	      <div class='modal-body'>
                	        <p class='lead text-center'>¡¡Intenta superar los ".$userData1['puntos']." puntazos de la última vez!!</p>
                	        <p class='lead text-center'>¿Jugamos otra partida?</p>
                	      </div>
                	      <div class='modal-footer'>
                	        <button type='button' class='btn btn-info' data-dismiss='modal'>De acuerdo</button>	        
                	      </div>
                	    </div><!-- /.modal-content -->
                	  </div><!-- /.modal-dialog -->
                	</div><!-- /.modal -->";
                break;
                //Ventana modal para caso de que el jugador ya exista en la BD.   
            case "updatePlayer":
                echo "<div class='modal fade' tabindex='-1' role='dialog' id='windowMessage'>
                	  <div class='modal-dialog'>
                	    <div class='modal-content'>
                	      <div class='modal-header'>
                	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                	        <h2 class='text-center'><img src='./img/User-IcoGreen.png' class='img-circle'><br>Datos personales actualizados</h2>
                	      </div>
                	      <div class='modal-body'>
                	        <table class='table'>
                                <thead>
                        			<tr>
                        			    <th>Datos</th>
                        			    <th>ID</th>
                        				<th>Nombre</th>
                        				<th>Apellido</th>
                        				<th>Edad</th>
                        			</tr>
                        		</thead>
                        		<tbody>
                        			<tr>
                        			    <td><strong>Datos anteriores</strong></td>
                        			    <td>".$userData1['ID']."</td>
                        				<td>".$userData1['nombre']."</td>
                        				<td>".$userData1['apellido']."</td>
                        				<td>".$userData1['edad']."</td>
                        			</tr>
                        			<tr class='success'>
                        			    <td><strong>Datos nuevos</strong></td>
                        			    <td class='success'>".$userData2['ID']."</td>
                        				<td class='success'>".$userData2['nombre']."</td>
                        				<td class='success'>".$userData2['apellido']."</td>
                        				<td class='success'>".$userData2['edad']."</td>
                        			</tr>
                        		</tbody>
                            </table>
                	      </div>
                	      <div class='modal-footer'>
                	        <button type='button' class='btn btn-success' data-dismiss='modal'>De acuerdo</button>	        
                	      </div>
                	    </div><!-- /.modal-content -->
                	  </div><!-- /.modal-dialog -->
                	</div><!-- /.modal -->";
                break;
        }
    }
}

?>