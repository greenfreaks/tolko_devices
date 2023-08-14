<?php
require('../libraries/fpdf/fpdf.php');
require "../php/connection.php";

$query_inventario = "SELECT * FROM inventario inv
INNER JOIN empresa_area area ON inv.fk_usuarioArea = area.id_empresaArea
INNER JOIN equipo_tipo eTipo ON inv.fk_equipoTipo = eTipo.id_tipoEquipo";
$DateAndTime = date('d-m-Y');
$result_inventario = mysqli_query($con, $query_inventario);
while ($responsiva = mysqli_fetch_assoc($result_inventario)) {
    class PDF extends FPDF
    {
        // Cabecera de página
        function Header()
        {
            // Logo
            // $this->Image('logo.png',10,8,33);
            // Arial bold 15
            $this->SetFont('Arial', 'B', 15);
            // Movernos a la derecha
            $this->Cell(70);
            // Título
            $this->Cell(70, 10, 'Reporte de inventario', 1, 0, 'C');
            // Salto de línea
            $this->Ln(20);

            $this->Cell(30, 10, utf8_decode('Usuario'), 1, 0, 'C', 0);
            $this->Cell(30, 10, utf8_decode('Ubicación'), 1, 0, 'C', 0);
            $this->Cell(30, 10, utf8_decode('Área'), 1, 0, 'C', 0);
            $this->Cell(30, 10, utf8_decode('Puesto'), 1, 0, 'C', 0);
            $this->Cell(30, 10, utf8_decode('Equipo'), 1, 1, 'C', 0);
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
    require "../php/connection.php";
    $query_inventario = "SELECT * FROM inventario inv
INNER JOIN empresa_area area ON inv.fk_usuarioArea = area.id_empresaArea
INNER JOIN equipo_tipo eTipo ON inv.fk_equipoTipo = eTipo.id_tipoEquipo
";
    $result_inventario = mysqli_query($con, $query_inventario);
    $pdf = new PDF();
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 12);

    while ($inventario = mysqli_fetch_assoc($result_inventario)) {
        $pdf->Cell(80, 10, $inventario['usuarioNombre'], 1, 0, 'C', 0);
    }
}
