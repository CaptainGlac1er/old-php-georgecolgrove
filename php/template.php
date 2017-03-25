<?php
if(!isset($showTemplate) || $showTemplate){ ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php
               if(isset($options)){
                   echo $options;
               }
        ?>
        <link rel="stylesheet" href="../style/site.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js">
        </script>
        <link rel="icon"
      type="image/png"
      href="/images/personalLogo2.png">
        <title><?php if(isset($title)) echo $title; ?></title>
    </head>
    <body>
        <script>
            $(this).ready(function(){
                $("#top").css('min-height', 'calc(100% - ' + ($('footer').outerHeight()) + 'px');
                $('#mobilemenu').click(function(){
                   $('nav').toggleClass('show', 'slow');

                });
            });
        </script>
        <script>
            $(document).ready(function(){
                <?php
                if(isset($scriptsready))
                    echo $scriptsready;
            ?>
            });
            <?php
                if(isset($scripts))
                    echo $scripts;
            ?>
        </script>
        <div id="contentback">
        </div>
        <div id="top">
                <a href="/"><header>
                    <div id="fullheader">
                        <img src="/images/personalLogo2.png" width="100" height="100" align="bottom">
                        <br />
                        <strong>George Walter Colgrove IV</strong><br/><strong>CaptainGlac1er</strong>
                    </div>
                    <div id="compactheader">
                        <img src="/images/personalLogo2.png" width="50" height="50" align="bottom">
                        <br />
                        <strong>George W. Colgrove IV</strong>
                    </div>
                </header></a>
                <div id="mobilemenu">= Menu</div>
                <nav>
                    <ul>
                        <a href="/hobbies.php" ><li <?php echo (strpos($_SERVER['PHP_SELF'], 'hobbies') !== false)?'style="background-color: darkgrey"' : '';?>>HOBBIES</li></a>
                        <a href="/resume.php"><li <?php echo (strpos($_SERVER['PHP_SELF'], 'resume') !== false)?'style="background-color: darkgrey"' : '';?>>RESUME</li></a>
                        <a href="/projects.php"><li <?php echo (strpos($_SERVER['PHP_SELF'], 'project') !== false)?'style="background-color: darkgrey"' : '';?>>PROJECTS</li></a>
                        <a href="/about.php"><li <?php echo (strpos($_SERVER['PHP_SELF'], 'about') !== false)?'style="background-color: darkgrey"' : '';?>>ABOUT</li></a>
                    </ul>
                </nav>
                <section id="content">

                    <?php
                        if(isset($content))
                            echo $content;
                    ?>
                </section>
        </div>
        <footer>
            <div class="footer">
            There are 10 types of people in this world, those who understand binary and those who don't. :D <br/>
            Copyright George Colgrove
                </div>
        </footer>
    </body>
</html>
<?php }?>
