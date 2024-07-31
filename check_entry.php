<?php
if (isset($_POST['student_id'])) {
    $student_id = $_POST['student_id'];
    $file = fopen("students.csv", "r");
    $found = false;

    while (($data = fgetcsv($file)) !== FALSE) {
        if ($data[0] == $student_id) {
            $student_info = [
                'id' => $data[0],
                'name' => $data[1],
                'age' => $data[2],
                // Add more fields as needed
            ];

            // Display student information
            echo "<h2>Student Details:</h2>";
            echo "<p>ID: " . htmlspecialchars($student_info['id']) . "</p>";
            echo "<p>Name: " . htmlspecialchars($student_info['name']) . "</p>";
            echo "<p>Age: " . htmlspecialchars($student_info['age']) . "</p>";

            $found = true;
            break;
        }
    }
    fclose($file);

    if (!$found) {
        echo "<h2>No entry found for Student ID: $student_id</h2>";
    }

    echo "<a href='operations.html'>Back to Operations</a>";
} else {
    echo "<h2>Invalid data. Please try again.</h2>";
    echo "<a href='operations.html'>Back to Operations</a>";
}
?>
