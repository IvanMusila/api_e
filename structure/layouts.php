<?php
    class layouts{
        public function heading(){
            ?>
            <!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>Document</title>
                <link rel="stylesheet" href="css/style.css">
            </head>
            <body>
            <?php
        }

        public function Formheading(){
            ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Sign Up</title>
            <link href="../css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>
        <?php
        }

        public function banner(){
            ?>
              <div class="p-3 mb-4 bg-body-tertiary rounded-3">
                <div class="container-fluid py-2">
                  <h1 class="display-5 fw-bold">Assignemnt II</h1>
                  <p class="col-md-8 fs-4">This is an individual assignment. We assume that you already know how to set up a localhost server(s): & MySQL database and Apache web servers.<br>If not, your instructor will assist you to set it up.  </p>
                  <button class="btn btn-primary btn-lg" type="button">Example button</button>
                </div>
              </div>
            <?php
        }

        public function footer(){
            ?>
<div class="footer">
    CopyRight &copy; ICS <?php print date('Y'); ?>
            </body>
            </html>
            <?php
        }
    }