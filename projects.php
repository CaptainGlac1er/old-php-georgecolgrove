<?php
    $title = "GWC RESUME";

$projects = array();
$projects["vector"] = newProject("Vector Math", null, "Vector math calculator", "https://www.microsoft.com/en-us/store/p/vector-math/9nblgggzl4hm");
$projects["chemistry"] = newProject("Chemistry Tools", null, "Chemistry App", "https://www.microsoft.com/en-us/store/p/chemistry-tools/9nblggh0g5zw");

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
                echo '<html><head><meta HTTP-EQUIV="REFRESH" content="0; url=' .  $item['LINK'] . '"></head></html>';
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
                    <h2>'. $proj["NAME"] . '</h2>
                    <div class="subsection">
                        <a href="'. $proj["LINK"] . '">Check it out!</a>
                    </div>
                </div>
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
