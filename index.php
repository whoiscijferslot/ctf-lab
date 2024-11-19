<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InlaneFreight</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #fff;
        text-align: center;
      }

      header {
        padding: 20px;
        margin: 0 auto;
        max-width: 800px;
      }

      h1 {
        font-size: 48px;
        font-weight: bold;
        color: #000;
        margin-bottom: 10px;
      }

      p {
        font-size: 16px;
        color: #555;
      }

      a.button {
        display: inline-block;
        margin-top: 20px;
        padding: 12px 24px;
        background-color: #007BFF;
        color: #fff;
        text-decoration: none;
        font-size: 18px;
        border-radius: 4px;
      }

      a.button:hover {
        background-color: #0056b3;
      }

      nav {
        margin-top: 30px;
      }

      nav a {
        margin: 0 10px;
        color: #007BFF;
        text-decoration: none;
        font-size: 18px;
      }

      nav a:hover {
        text-decoration: underline;
      }

      footer {
        margin-top: 50px;
        font-size: 14px;
        color: #777;
      }

      footer a {
        color: #555;
        text-decoration: none;
      }

      footer a:hover {
        color: #000;
      }

      .content {
        margin: 20px auto;
        max-width: 800px;
        text-align: left;
      }
    </style>
  </head>
  <body>
    <header>
      <h1>Worldwide Freight Services</h1>
      <p>Efficient and reliable freight services worldwide.</p>
      <a href="#" class="button">Get Started!</a>
    </header>
    
    <!-- Navigation -->
    <nav>
      <a href="index.php?page=home">Home</a>
      <a href="index.php?page=about">About Us</a>
      <a href="index.php?page=industries">Industries</a>
      <a href="index.php?page=contact">Contact</a>
      <?php 
	// echo '<li><a href="ilf_admin/index.php"><Admin</a></li>';
      ?>
    </nav>
    
    <!-- Dynamic Content Section -->
    <div class="content">

      <?php

      // Check if the page parameter is set
      if (!isset($_GET['page'])) {
        include "main.php"; // Default content
      } else {
        $page = $_GET['page'];

        // Prevent directory traversal attacks
        if (strpos($page, "..") !== false) {
          include "error.php";
        } 
	else {
	  include $page . ".php";
	}
      }
      ?>

    </div>

    <!-- Footer -->
    <footer>
      <p>
        Copyright ©2024 All rights reserved | This template is made with by 
        <a href="https://colorlib.com" target="_blank">Colorlib</a>
      </p>
    </footer>
  </body>
</html>
