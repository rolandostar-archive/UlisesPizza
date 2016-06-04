<?php
    class carrito{
        private $productos = [];

        public function add($desc,$cant,$precio){
            array_push($this->productos,array("desc"=>$desc,"cant"=>$cant,"precio"=>$precio));
        }

        public function display(){
            print_r($this->productos);
        }

        public function remove($index){
            array_splice($this->productos,$index,1);
        }

        public function update($index,$cant){
            //echo "recibi index: ".$index." y cant: ".$cant;
            //echo "cambio ".$this->productos[$index]["cant"]." por cant";
            $this->productos[$index]["cant"] = $cant;
        }

        public function countProducts(){
            return count($this->productos);
        }

        public function showCart(){
            echo '<table class="tabla-pedido"  style="width:100%">
                        <thead>
                            <tr>
                                <th>Descripcion</th>
                                <th>Cantidad</th>
                                <th>Precio individual</th>
                                <th>Precio total</th>
                            </tr>
                        </thead>
                        <tbody>';
                foreach($this->productos as $index => $producto){
                    echo '<tr><form action="carritoActualizar.php" method=POST>
                            <td style="width: 60%">'.$producto["desc"].'</td>
                            <td class="cant">
                            
                                <input type="hidden" name="index" value="'.$index.'">
                                <input class="quantity-input" type="number" name="cant" value='.$producto["cant"].' size="5" disabled><img class="edit-btn" src="./img/edit-icon.png"/><img class="accept-btn" src="./img/Ok-icon.png"/><img class="cancel-btn" src="./img/x-icon.png"/>
                                
                            </td>
                            <td>$'.$producto["precio"].'</td>
                            <td>$'.($producto["cant"]*$producto["precio"]).'</td>
                            </form>
                        </tr>';
                }
                echo '</tbody></table>';
        }
    }
?>