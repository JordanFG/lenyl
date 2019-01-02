<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
<head>
    <title><?= app::getInstance()->titre; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/fonts/font-awesome/css/font-awesome.min.css">
    <link href="public/css/connexion.css" type="text/css" rel="stylesheet">
</head>

<body>
    <div>
            
        <header>
            <div class="container" id="">
                <div class="row" >
                    <a href="index.php" class="logos" >Lenyl</a>
                </div>
            </div>
        </header>
        <section style="margin: 25px;">
            <nav>
                <p>
                    <?php
                    echo $content;
                ?>
                    
                </p>
            </nav>
        </section>
    </div>


</body>
