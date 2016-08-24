<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style/site.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">


        </script>
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <div id="contentback">
        </div>
        <div id="top">
                <header>
                    <img src="../images/personalLogo2.png" width="100" height="100" align="bottom">
                    <br />
                    <strong>George Walter Colgrove IV</strong><br/><strong>CaptainGlac1er</strong>
                </header>
                <nav>
                    <ul>
                        <a href="/"><li>INTERESTS</li></a>
                        <a href="/resume.php"><li>RESUME</li></a>
                        <li>ABOUT</li>
                    </ul>
                </nav>
                <section id="content">

                    <?php
                        echo $content;
                    ?>
                </section>
        </div>
        <footer>
            Copyright George Colgrove
        </footer>
    </body>
</html>