<?php
    //encabezadosobligatorios
    header("Access-Control-Allow-Origin:*");
    header("Access-Control-Allow-Headers:access");
    header("Access-Control-Allow-Methods:GET");header
    ("Access-Control-Allow-Credentials:true");
    header('Content-Type:application/json');
    //incluirarchivosdeconexionyobjetos
    include_once '../configuracion/conexion.php';
    include_once '../objetos/producto.php';
    //obtenerconexionalabasededatos
    $conex= new Conexion();
    $db=$conex->obtenerConexion();
    //prepararelobjetoproducto
    $product= new Producto($db);
    //setIDpropertyofrecordtoread
    $product->id=isset($_GET['id'])?$_GET['id']:
    die();
    //leerlosdetallesdelproductoaeditar
    $product->readOne();
    if($product->nombre!=null)
    {
        //creaciondelarreglo
        $product_arr=array(
                            "id"=>$product->id,
                            "nombre"=>$product->nombre,
                            "descripcion"=>$product->descripcion,
                            "precio"=>$product->precio,
                            "categoria_id"=>$product->categoria_id,
                            "categoria_desc"=>$product->categoria_desc
                        );
        //asignarcodigoderespuesta-200OK
        http_response_code(200);
        //mostrarloenformatojson
        echo json_encode($product_arr);}?>