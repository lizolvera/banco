<?php
session_start();
include_once 'Modelo/clsReportes.php';
include_once 'LibreriaFPDF/fpdf.php';

class controladorreportes2
{
    public function reportePrestamo()
    {
        $reporte = new clsReportes(); // Clase que está en el modelo

        // Consulta a la base de datos para obtener todos los préstamos
        $consulta = $reporte->reportePrestamos();

        if ($consulta && $consulta->num_rows > 0) {
            
            // Iniciar el buffer de salida
            ob_start();

            // Crear el objeto FPDF
            $pdf = new FPDF();
            // Agregar una página
            $pdf->AddPage();

            // Ruta absoluta a la imagen
            $imagePath = realpath('./img/bbva-azul.png'); // Asegúrate de que la ruta sea correcta

            // Verificar si la imagen existe
            if ($imagePath && file_exists($imagePath)) {
                $pdf->Cell(190, 30, $pdf->Image($imagePath, 130, 12, 60, 30), 0, 1, 'R');
            } else {
                // Manejar el error de imagen faltante
                $pdf->SetFont('Arial', 'B', 14);
                $pdf->Cell(0, 10, 'Logo no disponible', 0, 1, 'R');
            }

            // Establecer la fuente y el tamaño de la fecha
            $pdf->SetFont('Arial', '', 9);

            // Agregar la fecha
            $fecha = date("Y-m-d H:i:s");
            $pdf->SetXY(10, 12); // Posicionar la fecha en la esquina superior izquierda
            $pdf->Cell(0, 10, utf8_decode('Fecha: ' . $fecha), 0, 1, 'L');

            // Título del reporte
            $pdf->SetFont('Arial', 'B', 11);
            $pdf->Cell(0, 40, utf8_decode('Reporte de Prestamos'), 0, 1, 'C');

            // Centrar la tabla
            $pdf->SetLeftMargin(10); // Ajustar el margen izquierdo para centrar la tabla

            // Establecer la fuente y el tamaño del encabezado de la tabla
            $pdf->SetFont('Arial', 'B', 10);
            // Imprimir los encabezados de la tabla
            $pdf->Cell(40, 10, 'Nombre', 1, 0, 'C');
            $pdf->Cell(40, 10, 'Apellido Paterno', 1, 0, 'C');
            $pdf->Cell(40, 10, 'Apellido Materno', 1, 0, 'C');
            $pdf->Cell(30, 10, 'Prestamo', 1, 0, 'C');
            $pdf->Cell(40, 10, 'Fecha Prestamo', 1, 1, 'C');

            // Establecer la fuente y el tamaño del contenido de la tabla
            $pdf->SetFont('Arial', '', 10);
            // Imprimir los datos de la tabla
            while ($row = $consulta->fetch_assoc()) {
                $pdf->Cell(40, 10, $row["Nombre"], 1, 0, 'L');
                $pdf->Cell(40, 10, $row["Ap"], 1, 0, 'L');
                $pdf->Cell(40, 10, $row["Am"], 1, 0, 'L');
                $pdf->Cell(30, 10, $row["prestamo"], 1, 0, 'R');
                $pdf->Cell(40, 10, $row["fecha"], 1, 1, 'C');
            }

            // Salto de línea después de la tabla
            $pdf->Ln(10);

            // Limpiar el buffer de salida y no enviar su contenido al navegador
            ob_end_clean();

            // Mostrar el PDF
            $pdf->Output();

        } else {
            echo "<script>alert('No se encontraron registros de préstamos.');</script>";
        }
    }
}
?>
