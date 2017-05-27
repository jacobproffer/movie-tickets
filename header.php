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
    <title>Recent Movies</title>
    <meta name="keywords" content="movie, tickets, movie tickets, archive" />
    <meta name="description" content="This site serves as an archive of the movies Jacob Proffer has seen in theatres, powered by PHP, JSON and JavaScript." />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1"/>
    <link rel="apple-touch-icon" sizes="180x180" href="favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicons/favicon-16x16.png">
    <link rel="manifest" href="favicons/manifest.json">
    <link rel="mask-icon" href="favicons/safari-pinned-tab.svg" color="#9f9dc6">
    <link rel="shortcut icon" href="favicons/favicon.ico">
    <meta name="msapplication-config" content="favicons/browserconfig.xml">
    <meta name="theme-color" content="#2a2a43">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200" rel="stylesheet">
    <link rel="stylesheet" href="dist/css/project-main.min.css">
  </head>
  <body>
    <div class="info-modal close-info-modal">
      <div class="info-modal-container">
        <p>This site serves as an archive of the movies I've seen in theatres, powered by PHP, JSON and JavaScript. I've currently seen <span id="numOfMovies"></span> movies in <span id="numOfTheatres"></span> movie theatres since 2007.</p>
      </div>
      <div class="info-modal-footer">
        <span class="info-modal-close">Close</span>
      </div>
    </div>
    <div class="page-wrap">
      <header>
        <div class="container">
          <h1>Recent Movies</h1>
        </div>
      </header>
