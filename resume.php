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
$colleges[] = newCollege("Rochester Institute of Technology", "Software Engineering", "2015-2019", "images/rit.gif");
$colleges[] = newCollege("Vermont Technical College", "Computer Engineering", "2014-2015", "images/vtc.png");
$jobs = array();
$jobs[] = newEmployment("Rochester Institute of Technology", "Software Developer", "2015-2016", "images/rit.gif", '8 Bug fixes<br /> 2 Feature Improvements<br /> 1 Major Improvement<br/>Overhauled <a class="show" href="http://start.rit.edu/">start.rit.edu</a> and added a mobile interface');
$jobs[] = newEmployment("Vermont Agency of Transportation", "Technical Apprentice I", "2015", "images/vtran.png", "Improved efficiency of the on-campus lab, with new logging and reports for samples.");
$jobs[] = newEmployment("Vermont Technical College", "IT Helpdesk", "2014-2015", "images/vtc.png", "Took inventory of computers, repaired and setup computers, and on call support.");
$jobs[] = newEmployment("Vermont Technical College", "CIS-2261 Teacher Assistant", "2015-2015", "images/vtc.png", "Helped students with Java Programming.");
$jobs[] = newEmployment("Vermont Technical College", "Teacher Assistant", "2014-2014", "images/vtc.png", "Helped students with Website Development.");
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
            '. $job["YEARS"] . '</div>';
        if($job["DETAIL"] != null){
            $content .= '<div class="showDetails">▼</div>';
        }
    $content .='
            <img src="'. $job["IMG"] . '">
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
    <div class="group">
        <h2>PDF form</h2>
        <div class="subsection"><div>
        <object data="Docs/GeorgeColgroveResume.pdf" type="application/pdf" width="100%" height="600px">
  <p><a class="show" target="_blank" href="Docs/GeorgeColgroveResume.pdf">View here</a></p>
</object>
        </div>
        </div>

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
