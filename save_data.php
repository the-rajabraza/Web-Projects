<?php
if (isset($_POST['student_id']) && isset($_POST['name']) && isset($_POST['age'])) {
    $student_id = $_POST['student_id'];
    $name = $_POST['name'];
    $age = $_POST['age'];

    $file = fopen("students.csv", "a");
    fputcsv($file, array($student_id, $name, $age));
    fclose($file);

    echo "<h2>Data saved successfully!</h2>";
    echo "<a href='index.html'>Back to Data Entry</a>";
} else {
    echo "<h2>Invalid data. Please try again.</h2>";
    echo "<a href='index.html'>Back to Data Entry</a>";
}
?>