<?php
    $title = "GWC RESUME";
    $content = <<<EOF
    <div class="group">
        <h2>Colleges</h2>
EOF;

$colleges = array();
$colleges[] = newCollege("Rochester Institute of Tech", "Software Engineering", "2015-2020", "images/rit.gif");
$colleges[] = newCollege("Vermont Technical College", "Computer Engineering", "2014-2015", "images/vtc.png");
$jobs = array();
$jobs[] = newEmployment("Rochester Institute of Tech", "Software Developer", "2015-2016", "images/rit.gif");
$jobs[] = newEmployment("Vermont Agengy of Transportation", "Technical Apprentice I", "2015", "images/vtran.png");
foreach($colleges as $college){
    $content .= '
        <div class="subsection"><div>
            <h4>'. $college["NAME"] . '</h4><br/>
            '. $college["DEGREE"] . '<br/>
            '. $college["YEARS"] . '</div>
            <img src="'. $college["IMG"] . '">
        </div>
        ';}
$content .= <<<EOF
    </div>
    <div class="group">
        <h2>Employment</h2>
EOF;

foreach($jobs as $job){
    $content .= '
        <div class="subsection"><div>
            <h4>'. $job["NAME"] . '</h4><br/>
            '. $job["POS"] . '<br/>
            '. $job["YEARS"] . '</div>
            <img src="'. $job["IMG"] . '">
        </div>
        ';}
$content .= <<<EOF
    </div>


EOF;
    include("php/template.php");
function newCollege($name, $degree, $years, $img){
    $item = array();
    $item["NAME"] = $name;
    $item["DEGREE"] = $degree;
    $item["YEARS"] = $years;
    $item["IMG"] = $img;
    return $item;
}
function newEmployment($name, $pos, $years, $img){
    $item = array();
    $item["NAME"] = $name;
    $item["POS"] = $pos;
    $item["YEARS"] = $years;
    $item["IMG"] = $img;
    return $item;
}

?>
