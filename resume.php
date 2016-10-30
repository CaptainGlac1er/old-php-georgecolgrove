<?php
    $title = "GWC Resume";

    $scripts = '
        $(".subsection").click(function(){
            $(this).children(".details").toggle("slow");
        })
    ';

    $content = <<<EOF
    <div class="group">
        <h2>Colleges</h2>
EOF;

$colleges = array();
$colleges[] = newCollege("Rochester Institute of Technology", "Software Engineering", "2015-2020", "images/rit.gif");
$colleges[] = newCollege("Vermont Technical College", "Computer Engineering", "2014-2015", "images/vtc.png");
$jobs = array();
$jobs[] = newEmployment("Rochester Institute of Technology", "Software Developer", "2015-2016", "images/rit.gif", "8 Bug fixes<br /> 2 Feature Improvements<br /> 1 Major Improvement");
$jobs[] = newEmployment("Vermont Agency of Transportation", "Technical Apprentice I", "2015", "images/vtran.png", "Improved efficiency of the on-campus lab, with new logging and reports for samples.");
$languages = array();
$languages[] = newLanguage("Java", 3);
$languages[] = newLanguage("C#", 2);
$languages[] = newLanguage("PHP", 2);
$languages[] = newLanguage("SQL", 1);
$languages[] = newLanguage("Regex", 1);
foreach($colleges as $college){
    $content .= '
        <div class="subsection"><div><div class="text">
            <h4>'. $college["NAME"] . '</h4><br/>
            '. $college["DEGREE"] . '<br/>
            '. $college["YEARS"] . '</div>
            <img src="'. $college["IMG"] . '"></div>
        </div>
        ';}
$content .= <<<EOF
    </div>
    <div class="group">
        <h2>Employment</h2>
EOF;

foreach($jobs as $job){
    $content .= '
        <div class="subsection"><div><div class="text">
            <h4>'. $job["NAME"] . '</h4><br/>
            '. $job["POS"] . '<br/>
            '. $job["YEARS"] . '</div>
            <img src="'. $job["IMG"] . '">';
        if($job["DETAIL"] != null){
            $content .= '<div class="showDetails">▼</div>';
        }
    $content .='
        </div><br />';
    if($job["DETAIL"] != null){
    $content .= '
        <div class="details">';
            $content .= $job["DETAIL"];
    $content .='
        </div>';
    }
    $content .='
        </div>';
}
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
function newEmployment($name, $pos, $years, $img, $detail){
    $item = array();
    $item["NAME"] = $name;
    $item["POS"] = $pos;
    $item["YEARS"] = $years;
    $item["IMG"] = $img;
    $item["DETAIL"] = $detail;
    return $item;
}
function newLanguage($name, $years){
    $item = array();
    $item['NAME'] = $name;
    $item['YEARS'] = $years;
    return $item;
}

?>
