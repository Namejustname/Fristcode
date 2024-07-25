any language Without Login
🥳 Updated ✓ with 1000 X powerfull model 🤖 | now you can also chat with this AI
NewAIFree
Your Prompt:
Coding financial record php html CSS


🔙 Back to Old Model ( Not Recommended! )
GENERATE CODE

Your Code Generated Successfully ✅

I can help you create a financial record system using PHP, HTML, and CSS. Here's an example of a simple structure for your application:

Create a new folder named financial_records.
Inside this folder, create the following files:
index.php: This will be the main page displaying the records.
add_record.php: This page will allow users to add new financial records.
edit_record.php: This page will allow users to edit existing records.
delete_record.php: This page will delete records when needed.
styles.css: This file will contain your CSS styling for the application.
Now, let's write some code to fill these files.

First, create the index.php file with the following code:

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Financial Records</title>
</head>
<body>
    <h1>Financial Records</h1>
    <a href="add_record.php">Add New Record</a>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Description</th>
                <th>Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <!-- Display records here -->
            <?php
            // Connect to the database
            $conn = mysqli_connect("localhost", "username", "password", "database_name");

            // Check connection
            if (!$conn) {
                die("Connection failed: ". mysqli_connect_error());
            }

            // Retrieve records from the database
            $result = mysqli_query($conn, "SELECT * FROM financial_records");

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>". $row['id']. "</td>";
                echo "<td>". $row['date']. "</td>";
                echo "<td>". $row['description']. "</td>";
                echo "<td>". $row['amount']. "</td>";
                echo "<td><a href='edit_record.php?id=". $row['id']. "'>Edit</a> | <a href='delete_record.php?id=". $row['id']. "'>Delete</a></td>";
                echo "</tr>";
            }

            // Close database connection
            mysqli_close($conn);
           ?>
        </tbody>
    </table>
</body>
</html>
Next, create the add_record.php file with the following code:

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Add Financial Record</title>
</head>
<body>
    <h1>Add Financial Record</h1>
    <a href="index.php">Back to Records</a>

    <form action="add_record.php" method="post">
        <label for="date">Date:</label>
        <input type="date" name="date" id="date" required>

        <label for="description">Description:</label>
        <input type="text" name="description" id="description" required>

        <label for="amount">Amount:</label>
        <input type="number" step="0.01" name="amount" id="amount" required>

        <button type="submit">Add Record</button>
    </form>

    <?php
    // Add record to the database when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Connect to the database
        $conn = mysqli_connect("localhost", "username", "password", "database_name");

        // Check connection
        if (!$conn) {
            die("Connection failed: ". mysqli_connect_error());
        }

        // Prepare and execute SQL statement
        $stmt = $conn->prepare("INSERT INTO financial_records (date, description, amount) VALUES (?,?,?)");
        $stmt->bind_param("ssd", $_POST['date'], $_POST['description'], $_POST['amount']);

        // Check if record was added successfully
        if ($stmt->execute()) {
            echo "<p>Record added successfully.</p>";
        } else {
            echo "<p>Error: ". $stmt->error. "</p>";
        }

        // Close database connection
        $stmt->close();
        mysqli_close($conn);
    }
   ?>
</body>
</html>
