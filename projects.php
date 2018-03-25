<?php
    $title = "GWC Projects";

$projects = array();
$projects['3uler'] = newProject('3uler Discord Bot',"https://github.com/CaptainGlac1er/3uler","Uses Discord.net library version 1.0, has both a console and gui interface", null);
$projects["chemistryuwp"] = newProject("Chemistry Tools UWP", "https://github.com/CaptainGlac1er/ChemistryToolsUWP", "Chemistry App that now runs on UWP", "https://www.microsoft.com/en-us/store/p/chemistrytoolsuwp/9p4x65lm9mm1");
$projects['WebServer'] = newProject('Web Server', "https://github.com/CaptainGlac1er/resume", "Built this web server to host this website.", "index.php");
$projects['LaserProject'] = newProject('Laser Project', null, "Fun laser project", "https://youtu.be/nAnuzva5i8w");
$projects["vector"] = newProject("Vector Math", null, "Vector math calculator", "https://www.microsoft.com/en-us/store/p/vector-math/9nblgggzl4hm");
$projects["chemistry"] = newProject("Chemistry Tools", "https://github.com/CaptainGlac1er/ChemistryTools", "Chemistry App that I built for chemistry class.", "https://www.microsoft.com/en-us/store/p/chemistry-tools/9nblggh0g5zw");
$projects["Discordtest"] = newProject("Discord Bot", "https://github.com/CaptainGlac1er/DiscordTest", "Fun project that I wanted to do to have fun with the Discord API. Pulls data from imgur, cleverbot, weather underground, and openweathermap.", null);
$projects["tigertenant"] = newProject("Tiger Tenant", "https://github.com/CaptainGlac1er/swen-356-sublet", "Built with a team of 5 using the scrum process", null);
if(!empty($_GET) & isset($_GET["type"])){
    switch($_GET['type']){
        case "get":
            if(isset($_GET['app']) && isset($projects[$_GET['app']])){
                $item = $projects[$_GET['app']];
                $content = $item["NAME"] . " " . $item['LINK'];

            }else{
                $content = "empty app";
            }
            break;
        case "redirect":
            if(isset($_GET['app']) && isset($projects[$_GET['app']])){
                $item = $projects[$_GET['app']];
                $content = $item["NAME"] . " " . $item['LINK'];
                if($item['LINK'] != null)
                    echo '<html><head><meta HTTP-EQUIV="REFRESH" content="0; url=' .  $item['LINK'] . '"></head></html>';
                else if($item['GITHUB'] != null)
                    echo '<html><head><meta HTTP-EQUIV="REFRESH" content="0; url=' .  $item['GITHUB'] . '"></head></html>';
                return;
            }else{
                $content = "empty app";
            }
            break;
        default:
            $content = "empty";
    }
}else{
    $output = "<div>";
    foreach($projects as $proj){
                $output .= '
                <div class="group">
                    <h2>'. $proj["NAME"] . '</h2>';
                if(isset($proj['DESC']) && $proj['DESC'] != null){
                    $output .='
                    <div class="subsection">
                        '. $proj['DESC'] . '
                    </div>';
                }
                if((isset($proj["GITHUB"]) && $proj["GITHUB"] != null) || (isset($proj["LINK"]) && $proj["LINK"] != null)){
                    $output .= '<div class="subsection">';
                if(isset($proj["GITHUB"]) && $proj["GITHUB"] != null){
                    $output .='
                        <a class="button" href="'. $proj["GITHUB"] . '">Github Link :)</a>';
                }
                if(isset($proj["LINK"]) && $proj["LINK"] != null){
                    $output .= '
                        <a class="button" href="'. $proj["LINK"] . '">Check it out!</a>';
                }
                    $output .= '</div>';
                }
                $output .='</div>
                ';
                //$output .= $proj["NAME"] . " " . $proj['LINK'] . "<br/>";
    }
    $output .= "</div>";
    $content = $output;
}


include("php/template.php");
function newProject($name, $github, $desc, $link){
    $item = array();
    $item["NAME"] = $name;
    $item["GITHUB"] = $github;
    $item["DESC"] = $desc;
    $item["LINK"] = $link;
    return $item;
}

?>
