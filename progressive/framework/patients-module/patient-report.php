<?php
require_once('fpdf.php');
require_once('patients.php'); 

$patients = new Patients($pdo);
$patientList = $patients->list_patients();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $patient_id = $_POST['patient_id'];
    $patient_fullname = $patients->get_patient_fullname($patient_id);
    $consultation_date = $_POST['consultation_date'] ?? date('Y-m-d');
    $consultation_notes = $_POST['consultation_notes'] ?? 'No notes provided';
    $medication = $_POST['medication'] ?? 'No medication prescribed';

    $sql = "INSERT INTO consultations (patient_fullname, consultation_date, consultation_notes, medication) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$patient_fullname, $consultation_date, $consultation_notes, $medication]);

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, 'Consultation Report', 0, 1, 'C');
    $pdf->SetFont('Arial', '', 12);
    $pdf->Cell(40, 10, 'Patient Name: ' . $patient_fullname, 0, 1);
    $pdf->Cell(40, 10, 'Consultation Date: ' . $consultation_date, 0, 1);
    $pdf->Cell(40, 10, 'Consultation Notes:', 0, 1);
    $pdf->MultiCell(0, 10, $consultation_notes);
    $pdf->Cell(40, 10, 'Medication Prescribed:', 0, 1);
    $pdf->MultiCell(0, 10, $medication);

    $pdf->Output();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultation Form</title>
</head>
<body>
    <h1>Consultation Form</h1>
    <form action="patient-details.php" method="post">
    <label for="patient_id">Select Patient:</label><br>
    <select id="patient_id" name="patient_id" required>
        <?php foreach ($patientList as $patient) {
            echo "<option value='" . $patient['patient_id'] . "'>" . htmlspecialchars($patient['patient_fullname']) . "</option>";
        } ?>
    </select><br><br>

        <label for="consultation_date">Date:</label><br>
        <input type="date" id="consultation_date" name="consultation_date" required><br><br>

        <label for="consultation_notes">Consultation Notes:</label><br>
        <textarea id="consultation_notes" name="consultation_notes" rows="4" cols="50" required></textarea><br><br>

        <label for="medication">Medication:</label><br>
        <textarea id="medication" name="medication" rows="2" cols="50" required></textarea><br><br>

        <input type="submit" value="Generate PDF">
    </form>
</body>
</html>