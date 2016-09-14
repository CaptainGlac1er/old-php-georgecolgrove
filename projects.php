<?php
    $title = "GWC RESUME";

$projects = array();
$projects["vector"] = newProject("Vector Math", null, "Vector math calculator", "https://www.microsoft.com/en-us/store/p/vector-math/9nblgggzl4hm");

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
        default:
            $content = "empty";
    }
}else{
    $content = "";
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
