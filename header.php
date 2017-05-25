<?php

// Get JSON
$movies_data = "json/movies.json";
$movies_json = file_get_contents($movies_data);
$data = json_decode($movies_json, TRUE);

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>I Collect Movie Tickets</title>
    <meta name="keywords" content="movie, tickets, movie tickets, collection" />
    <meta name="description" content="My name is Jacob Proffer and I collect movie tickets." />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1"/>
    <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
    <link rel="manifest" href="favicons/manifest.json">
    <link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="favicons/favicon.ico">
    <meta name="msapplication-config" content="favicons/browserconfig.xml">
    <meta name="theme-color" content="#000000">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/project-main.min.css">
  </head>
  <body>
    <div class="page-wrap">
      <header>
        <div class="container">
          <a class="logo" href="index.php">
            <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 2" viewBox="0 0 100 50">
              <path fill="#aa5b28" d="M92.26 3a8.36 8.36 0 0 0 3 3.81l-1.68.9a3 3 0 0 0 0 5.29L97 14.83v.81l-3.42 1.83a3 3 0 0 0 0 5.29L97 24.59v.81l-3.42 1.83a3 3 0 0 0 0 5.29L97 34.36v.81L93.58 37a3 3 0 0 0 0 5.29l1.68.9a8.36 8.36 0 0 0-3 3.81H7.71a8.36 8.36 0 0 0-3-3.81l1.68-.9a3 3 0 0 0 0-5.29L3 35.17v-.81l3.42-1.83a3 3 0 0 0 0-5.29L3 25.41v-.81l3.42-1.83a3 3 0 0 0 0-5.29L3 15.64v-.81L6.42 13a3 3 0 0 0 0-5.29l-1.68-.9A8.36 8.36 0 0 0 7.71 3h84.58m2.44-3H5.26A5.29 5.29 0 0 1 0 5.32v2.36l5 2.68L0 13v4.4l5 2.68-5 2.72v4.4l5 2.68-5 2.68V37l5 2.68-5 2.64v2.36A5.29 5.29 0 0 1 5.26 50h89.48a5.29 5.29 0 0 1 5.26-5.32v-2.36l-5-2.68 5-2.64v-4.4l-5-2.68 5-2.68V22.8l-5-2.68 5-2.68V13l-5-2.68 5-2.68V5.32A5.29 5.29 0 0 1 94.74 0z"/>
              <path fill="#aa5b28" d="M84 9a3 3 0 0 1 3 3v26a3 3 0 0 1-3 3H16a3 3 0 0 1-3-3V12a3 3 0 0 1 3-3h68m0-3H16a6 6 0 0 0-6 6v26a6 6 0 0 0 6 6h68a6 6 0 0 0 6-6V12a6 6 0 0 0-6-6z"/>
            </svg>
          </a>
        </div>
      </header>
