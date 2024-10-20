<?php
// Include the database connection
require('db.php');

// Query to fetch all student cleaning requests from the 'cleanrequest' table
$query = "SELECT * FROM cleanrequest";  // Ensure this matches your table name
$result = mysqli_query($db, $query);

// Check for errors in the query
if (!$result) {
    error_log("Error fetching requests: " . mysqli_error($db), 3, 'error_log.txt');
    die('Error fetching requests');
}

// Check if any rows are returned
if (mysqli_num_rows($result) === 0) {
    echo '<tr><td colspan="4">No cleaning requests found in the database.</td></tr>';
    error_log("No requests found.", 3, 'error_log.txt');
} else {
    // Prepare the output to display the cleaning requests
    $output = '';
    while ($row = mysqli_fetch_assoc($result)) {
        $output .= '
            <tr>
                <td>' . htmlspecialchars($row['rollnumber']) . '</td>
                <td>' . strtoupper(htmlspecialchars($row['room'])) . '</td>
                <td>' . htmlspecialchars($row['date']) . '</td>
                <td>' . htmlspecialchars($row['cleaningtime']) . '</td>
            </tr>';
    }
    
    // Output the result table rows
    echo $output;
}

// Close the database connection
mysqli_close($db);
?>
