<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style/site.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
        </script>
        <link rel="icon"
      type="image/png"
      href="../images/personalLogo2.png">
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <script>
            $(this).ready(function(){
                $('#mobilemenu').click(function(){
                   $('nav').toggleClass('show', 'slow');

                });
            });
        </script>
        <div id="contentback">
        </div>
        <div id="top">
                <header>
                    <div id="fullheader">
                        <img src="../images/personalLogo2.png" width="100" height="100" align="bottom">
                        <br />
                        <strong>George Walter Colgrove IV</strong><br/><strong>CaptainGlac1er</strong><br /><a href="https://www.linkedin.com/in/georgecolgrove"><strong>LinkedIn</strong></a>
                    </div>
                    <div id="compactheader">
                        <img src="../images/personalLogo2.png" width="50" height="50" align="bottom">
                        <br />
                        <strong>George W. Colgrove IV</strong><br/><a href="https://www.linkedin.com/in/georgecolgrove"><strong>LinkedIn</strong></a>
                    </div>
                </header>
                <div id="mobilemenu">= Menu</div>
                <nav>
                    <ul>
                        <a href="/" ><li <?php echo (strpos($_SERVER['PHP_SELF'], 'index') !== false)?'style="background-color: darkgrey"' : '';?>>INTERESTS</li></a>
                        <a href="/resume.php"><li <?php echo (strpos($_SERVER['PHP_SELF'], 'resume') !== false)?'style="background-color: darkgrey"' : '';?>>RESUME</li></a>
                        <a href="/projects.php"><li <?php echo (strpos($_SERVER['PHP_SELF'], 'project') !== false)?'style="background-color: darkgrey"' : '';?>>PROJECTS</li></a>
                        <a href="/about.php"><li <?php echo (strpos($_SERVER['PHP_SELF'], 'about') !== false)?'style="background-color: darkgrey"' : '';?>>ABOUT</li></a>
                    </ul>
                </nav>
                <section id="content">

                    <?php
                        echo $content;
                    ?>
                </section>
        </div>
        <footer>
            <div class="footer">
            There are 10 types of people in this world, those who understand binary and those who dont. :D <br/>
            Copyright George Colgrove
                </div>
        </footer>
    </body>
</html>
