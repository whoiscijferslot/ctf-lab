<?php
// Get the log file from the query parameter, default to 'access.log'
$log = isset($_GET['log']) ? $_GET['log'] : 'access.log'; 

// Define the base directory to limit file inclusion scope (can be removed for full LFI vulnerability)
$baseDir = '/var/log/apache2/';

// Try to build the log file path dynamically
$logfile = $baseDir . $log;

// Check if the log file exists and is readable
if (!file_exists($logfile) || !is_readable($logfile)) {
    $logfile = ''; // If the log file doesn't exist or isn't readable, show an error
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
    }

    .container {
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }

    .log-switcher {
      margin-bottom: 20px;
    }

    .log-switcher button {
      margin: 0 10px;
      padding: 10px 20px;
      background-color: #007BFF;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    .log-switcher button:hover {
      background-color: #0056b3;
    }

    .log-window {
      display: flex;
      width: 80%;
      height: 60%;
      border: 1px solid #ccc;
      border-radius: 5px;
      overflow: hidden;
      background-color: #fff;
    }

    .log {
      flex: 1;
      padding: 20px;
      overflow-y: auto;
      border-right: 1px solid #ccc;
    }

    .log:last-child {
      border-right: none;
    }

    pre {
      font-family: Consolas, monospace;
      font-size: 14px;
      color: #333;
    }

    h1 {
      text-align: center;
      color: #333;
    }

    p {
      text-align: center;
      color: #666;
    }
  </style>
</head>
<body>

<div class="container">
  <!-- Admin Panel Welcome Section -->
  <h1>Welcome to the Admin Panel</h1>
  <p>This is a vulnerable section for testing purposes.</p>

  <!-- Log Viewer Section -->
  <div class="log-switcher">
    <button onclick="showLog('access.log')">Access Log</button>
    <button onclick="showLog('error.log')">Error Log</button>
  </div>

  <div class="log-window">
    <!-- First log window (access.log) -->
    <div class="log" id="log1">
      <?php
      // Display the content of the selected log file
      if ($logfile) {
        echo '<pre>' . htmlspecialchars(file_get_contents($logfile)) . '</pre>';
      } else {
        echo '<pre>Log file not found or invalid request.</pre>';
      }
      ?>
    </div>

    <!-- Second log window (error.log) -->
    <div class="log" id="log2">
      <?php
      // Display the content of the error.log file (can also be injected)
      $error_logfile = '/var/log/apache2/error.log';
      if (file_exists($error_logfile) && is_readable($error_logfile)) {
        echo '<pre>' . htmlspecialchars(file_get_contents($error_logfile)) . '</pre>';
      } else {
        echo '<pre>Error log not found or invalid request.</pre>';
      }
      ?>
    </div>
  </div>
</div>

<script>
  function showLog(logFile) {
    // Update the URL with the selected log file parameter (causing the page to reload)
    window.location.href = "index.php?log=" + logFile;
  }

  // Default log display based on URL parameter
  if (window.location.search.indexOf('log=error.log') !== -1) {
    document.getElementById('log2').style.display = 'block';
    document.getElementById('log1').style.display = 'none';
  } else {
    document.getElementById('log1').style.display = 'block';
    document.getElementById('log2').style.display = 'none';
  }
</script>

</body>
</html>
