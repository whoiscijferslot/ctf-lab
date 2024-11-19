<?php
// Display all errors for debugging
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Get the path of the current script to expose the file structure
$current_file = __FILE__; // Get the full path of this error.php file
$document_root = $_SERVER['DOCUMENT_ROOT']; // The document root directory

// Show useful information for debugging
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Error Occurred</title>
  <style>
   body {
      font-family: Arial, sans-serif;
      background-color: #fff;
      margin: 0;
      padding: 0;
      text-align: center;
    }

    .container {
      width: 80%;
      max-width: 1000px;
      margin: 30px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
      font-size: 48px;
      color: #000;
      text-align: center;
      margin-bottom: 10px;
    }

    p {
      font-size: 16px;
      color: #555;
      text-align: center;
    }

    pre {
      background-color: #2c3e50;
      color: #ecf0f1;
      padding: 15px;
      border-radius: 5px;
      font-family: Consolas, monospace;
      white-space: pre-wrap;
      word-wrap: break-word;
      margin-bottom: 20px;
    }

    .debug-info {
      background-color: #f8f8f8;
      border: 1px solid #ccc;
      padding: 20px;
      margin-top: 20px;
      border-radius: 5px;
    }

    .debug-info h2 {
      margin-top: 0;
      color: #555;
      margin-bottom: 10px;
    }

    .debug-info pre {
      background-color: #34495e;
      color: #ecf0f1;
      padding: 15px;
      font-size: 14px;
    }

    .debug-info p {
      margin: 10px 0;
    }
  </style>
</head>
<body>

<div class="container">
  <h1>An Error Occurred!</h1>
  <p>Something went wrong while trying to load the page. Below is the error information to help diagnose the issue:</p>
  
  <div class="debug-info">
    <h2>Error Details:</h2>
    <pre>
Current file path: <?php echo $current_file; ?> 
Document root path: <?php echo $document_root; ?>
    </pre>
  </div>

  <div class="debug-info">
    <h2>Request Information:</h2>
    <?php
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
        echo "<pre>The requested page was: <strong>" . htmlspecialchars($page) . "</strong></pre>";
    }
    ?>
    <h2>Debug Backtrace:</h2>
    <pre><?php debug_print_backtrace(); ?></pre>
  </div>
</div>

</body>
</html>
