<?php
if(isset($_GET['images'])){
switch($_GET['images']){
    case 'get':
        $showTemplate = false;
        $files = array();
        $dir = 'Photos';
        if($d = opendir($dir)){
            while(false !== ($file = readdir($d))){
                if(strpos($file, '.jpg') !== false){
                    $files[] = $dir . '\\' . $file;
                }
            }
        }
        echo json_encode($files);
        break;
}
}else{
    $title = "GWC";
    $options = <<<EOF
        <link rel="stylesheet" href="style/photoviewer.css">
EOF;
    $scripts = <<<EOF
    var images = [];
    var index = 0;
    $(document).ready(function(){
    $.ajax({
        dataType: "json",
        url: "/photos.php?images=get",
        success: function(data, status, jqXHR){
            $.each(data, function(key, val){
                images.push(val);
            })
            displayImages();
        }
    })
    });
    /*$( document ).ajaxComplete(function( event, xhr, settings ) {
        if ( settings.url === "/photos.php?images=get" ) {
            console.log( "Triggered ajaxComplete handler. The result is " + xhr.responseText );
        }
    });*/
    function displayImages(){
        console.log(images.length);
        if(images.length > 0){
            $("#photo").html('<img src="' + images[index] + '">');
        }
    }
    function nextPhoto(){
        if(index + 1 < images.length)
            index++;
        else
            index = 0;
        $('#photo img').attr("src", images[++index]);
    }
    function prevPhoto(){
        if(index - 1 >= 0)
            index--;
        else
            index = images.length - 1;
        $('#photo img').attr("src", images[index]);

    }
EOF;
    $content = <<<EOF
    <div class="group">
        <h2>Photography</h2>
        <div class="groupcontent">
            <div id="photoviewer">
                <div id="forward" class="photobuttons disable-select" onclick="nextPhoto()">
                >
                </div>
                <div id="back" class="photobuttons disable-select" onclick="prevPhoto()">
                <
                </div>
                <div id="photo">
                </div>
            </div>
        </div>
    </div>
    <div class="group">
        <h2>More Content</h2>
        <div class="subsection">
            Please like my Facebook to keep yourself updated.
            <a class="button" href="https://www.facebook.com/gwcphotography/">Click here :)</a>
        </div>
    </div>
EOF;

}
include("php/template.php");
?>
