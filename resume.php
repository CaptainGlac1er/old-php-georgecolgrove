<?php
    $title = "GWC Resume";
    $content = <<<EOF
    <div class="group">
        <h2>Colleges</h2>
EOF;

$colleges = array();
$colleges[] = newCollege("Rochester Institute of Technology", "Software Engineering", "2015-2020", "images/rit.gif");
$colleges[] = newCollege("Vermont Technical College", "Computer Engineering", "2014-2015", "images/vtc.png");
$jobs = array();
$jobs[] = newEmployment("Rochester Institute of Technology", "Software Developer", "2015-2016", "images/rit.gif");
$jobs[] = newEmployment("Vermont Agency of Transportation", "Technical Apprentice I", "2015", "images/vtran.png");
$languages = array();
$languages[] = newLanguage("Java", 3);
$languages[] = newLanguage("C#", 2);
$languages[] = newLanguage("PHP", 2);
$languages[] = newLanguage("SQL", 1);
$languages[] = newLanguage("Regex", 1);
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
    <div class="group">
        <h2>Languages</h2>
EOF;

foreach($languages as $language){
    $content .= '
        <div class="subsection"><div>
            <h4>'. $language["NAME"] . '</h4><br/>
            ' . $language['YEARS'] .' year' . (($language['YEARS'] > 1) ? "s" : "") . '</div>
        </div>
        ';}
$content .= <<<EOF
    </div>

EOF;
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
function newLanguage($name, $years){
    $item = array();
    $item['NAME'] = $name;
    $item['YEARS'] = $years;
    return $item;
}

?>
