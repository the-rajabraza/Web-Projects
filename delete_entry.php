<?php
if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];
    $file = fopen("students.csv", "r");
    $temp = fopen("temp.csv", "w");
    $found = false;

    while (($data = fgetcsv($file)) !== FALSE) {
        if ($data[0] != $student_id) {
            fputcsv($temp, $data);
        } else {
            $found = true;
        }
    }
    fclose($file);
    fclose($temp);

    if ($found) {
        rename("temp.csv", "students.csv");
        echo "<h2>Entry for Student ID: $student_id deleted successfully!</h2>";
    } else {
        unlink("temp.csv");
        echo "<h2>No entry found for Student ID: $student_id</h2>";
    }

    echo "<a href='operations.html'>Back to Operations</a>";
} else {
    echo "<h2>Invalid data. Please try again.</h2>";
    echo "<a href='operations.html'>Back to Operations</a>";
}
?>