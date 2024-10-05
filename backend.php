<?php
// Enable error reporting to debug issues
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'Clear Text' button was clicked
    if (isset($_POST['clear'])) {
        $_POST['myText'] = ''; // Clear the 'Write About Yourself' field
    }

    // Process form data
    $name = isset($_POST['myName']) ? htmlspecialchars($_POST['myName']) : '';
    $role = isset($_POST['myRole']) ? htmlspecialchars($_POST['myRole']) : '';
    $about = isset($_POST['myText']) ? htmlspecialchars($_POST['myText']) : '';

    // Display submitted data for testing
    echo "Form submitted successfully!<br>";
    echo "Name: $name<br>";
    echo "Role: $role<br>";
    echo "About Yourself: $about<br>";

    // Save the data to a file
    $file = 'submissions.txt'; // Name of the file to save data
    $data = "Name: $name, Role: $role, About Yourself: $about\n";
    
    // Write the data to the file (appending to the file)
    file_put_contents($file, $data, FILE_APPEND);
    
    echo "Data saved to file successfully!";
}
?>
