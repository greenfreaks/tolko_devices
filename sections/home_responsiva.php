<?php
require('../libraries/fpdf/fpdf.php');
require "../php/connection.php";
$id = $_GET["id"];

$query_inventario = "SELECT * FROM inventario inv
INNER JOIN empresa_area area ON inv.fk_usuarioArea = area.id_empresaArea
INNER JOIN equipo_tipo eTipo ON inv.fk_equipoTipo = eTipo.id_tipoEquipo
INNER JOIN equipo_marca eMarca ON inv.fk_equipoMarca = eMarca.idMarca
INNER JOIN equipo_modelo eModelo ON inv.fk_equipoModelo = eModelo.idModelo
WHERE idInventario = '$id' ";
$dateTime = date('Y-m-d');  
$result_inventario = mysqli_query($con, $query_inventario);
    while($responsiva = mysqli_fetch_assoc($result_inventario)){
        class PDF extends FPDF
        {
        // Cabecera de página
        function Header()
        {
            // Logo
            $this->Image('logo.png',10,8,33);
            // Arial bold 15
            $this->SetFont('Arial','B',15);
            // Movernos a la derecha
            $this->Cell(80);
            // Título
            $this->Cell(30,10,'Title',1,0,'C');
            // Salto de línea
            $this->Ln(20);
        }
        
        // Pie de página
        function Footer()
        {
            // // Posición: a 1,5 cm del final
            // $this->SetY(-15);
            // // Arial italic 8
            // $this->SetFont('Arial','I',8);
            // // Número de página
            // $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
        }
        }
        
        // Creación del objeto de la clase heredada
        $pdf = new PDF();
        $pdf->AliasNbPages();
        $pdf->AddPage();
        $pdf->SetFont('Arial','',12);
        $pdf->MultiCell(0,6,utf8_decode("
        
        Fecha: {$dateTime}
        Lugar: Tizayuca, Hgo.
        
        Por medio de la presente se hace constar que en este acto recibo de la empresa Comercializadora y Administradora Integral, S.A. de C.V. {$responsiva['equipoNombre']}, {$responsiva['nombreMarca']}, {$responsiva['nombreModelo']} con No. de Serie: {$responsiva['equipoNoSerie']}, mismo que tiene un costo total de $ {$responsiva['equipoPrecio']}({$responsiva['equipoPrecioLetra']} M.N..), comprometiéndome a utilizar dicho equipo única y exclusivamente para los fines que me son conferidos por las funciones a mi cargo como {$responsiva['usuarioPuesto']}  que me es asignado como una herramienta de trabajo, asumiendo la responsabilidad total y absoluta por cualquier daño o deterioro derivado de un mal uso, así como por el robo o extravío del mismo obligándome a responder por la reparación o reposición que en su caso proceda, ya sea cubriendo el monto del costo del mismo o a reponerlo por otro de las mismas características y a devolverlo en el momento en el que me sea requerido o cuando se tenga por concluida mi relación de trabajo, por lo que estoy de acuerdo que en caso de no reponerlo o restituirlo se proceda con el cobro o descuento por nómina, o bien de mi finiquito o liquidación, en el entendido que el valor del equipo y los accesorios se desglosan de la siguiente forma: 
        Costo: $ {$responsiva['equipoPrecio']} 
        Total: $ {$responsiva['equipoPrecio']} 
        
        Nombre de quien recibe el equipo: {$responsiva['usuarioNombre']}
        Puesto: {$responsiva['usuarioPuesto']} 
        
        
        
        
        _______________________	                	 
         Firma "),0,1);
         $pdf->Output("{$responsiva['idInventario']} {$responsiva['usuarioNombre']} - {$responsiva['equipoNombre']} {$responsiva['equipoNoSerie']} .pdf", 'I');

    }
?>