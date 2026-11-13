<?php
include "db.php";
include "header.php";

$search = $_GET['search'] ?? "";

//$search, eg: %Al = Ali,
$like = "%$search%";

//$sql = $conn->prepare("SELECT * FROM results");
$sql = $conn->prepare("SELECT * FROM results
WHERE student_name LIKE ? OR matric_no LIKE ? 
OR subject_name LIKE ? OR subject_code LIKE ?");

$sql -> bind_param("ssss", $like, $like, $like, $like);
//s = string, i = interger, d = double

$sql->execute();

$result = $sql->get_result();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Assessment</title>
</head>

<body>
    

    <h2>Student Records</h2>

    <a href="add.php">+ Add Results </a><br><br>

    <form method = "get">
    <input type="text" name = "search" placeholder="Search by name or id"
    value = "<?php $search ?>">
    <button type = "submit">Search</button>
    <a href="index.php">Show all</a>
    </form>

    <div><br>
        <table border="1" cellpadding="10">
            <tr>
                <th>No.</th>
                <th>Student Name</th>
                <th>Matrics No.</th>
                <th>Subject</th>
                <th>Test 1 (20%)</th>
                <th>Test 2 (30%)</th>
                <th>Final (50%)</th>
                <th>Total (100%)</th>
                <th>Grade</th>
                <th>Action</th>
            </tr>
            <?php
            $no = 1; //$no ++ = $no + 1 if else, while loop, switch case

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $no ++ . "</td>";
                echo "<td>" . $row['student_name'] . "</td>";
                echo "<td>" . $row['matric_no'] . "</td>";
                echo "<td>" . $row['subject_name'] . "<br> (" . $row['subject_code'] .") </td>";
                echo "<td>" . $row['test1'] . "</td>";
                echo "<td>" . $row['test2'] . "</td>";
                echo "<td>" . $row['final_exam'] . "</td>";
                echo "<td>" . $row['total_marks'] . "</td>";
                echo "<td>" . $row['grade'] . "</td>";
                echo "<td>";
                    echo "<button><a href='edit.php?id=" . $row['result_id'] . "'>Edit</a></button>";
                    echo "<form method='post' action='delete.php' 
                    onsubmit='return confirm(\"Are you sure you want to delete this record?\")'>";
                    echo "<input type = 'hidden' name='delete' value='" . $row['result_id'] . "'>";
                    echo "<button type='submit'>Delete</button>";
                    echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>



</body>

</html>