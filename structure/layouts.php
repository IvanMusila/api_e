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
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        </head>
        <body>
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