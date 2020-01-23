<?php 

class obj implements ArrayAccess {
    private $contenedor = array();

    public function __construct() {
        $this->contenedor = array(
            "uno"   => 1,
            "dos"   => 2,
            "tres" => 3,
        );
    }

    public function offsetSet($offset, $valor) {
        if (is_null($offset)) {
            $this->contenedor[] = $valor;
        } else {
            $this->contenedor[$offset] = $valor;
        }
    }

    public function offsetExists($offset) {
        return isset($this->contenedor[$offset]);
    }

    public function offsetUnset($offset) {
        unset($this->contenedor[$offset]);
    }

    public function offsetGet($offset) {
        return isset($this->contenedor[$offset]) ? $this->contenedor[$offset] : null;
    }
}

$obj = new obj;

/*
var_dump(isset($obj["dos"]));
var_dump($obj["dos"]);
unset($obj["dos"]);
var_dump(isset($obj["dos"]));
$obj["dos"] = "Un valor";
var_dump($obj["dos"]);
$obj[] = 'Añadido 1';
$obj[] = 'Añadido 2';
$obj[] = 'Añadido 3';
print_r($obj);
*/
?>