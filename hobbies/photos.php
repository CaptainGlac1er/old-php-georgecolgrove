<?php
if(isset($_GET['images'])){
switch($_GET['images']){
    case 'get':
        $showTemplate = false;
        $files = array();
        $dir = $_SERVER['DOCUMENT_ROOT'] . '\\Photos';
        $httpdir = '/Photos';
        if($d = opendir($dir)){
            while(false !== ($file = readdir($d))){
                if(strpos($file, '.jpg') !== false){
                    $files[] = $httpdir . '/' . $file;
                }
            }
        }
        echo json_encode($files);
        break;
}
}else{
    $title = "GWC";
    $options = <<<EOF
        <link rel="stylesheet" href="../style/photoviewer.css">
EOF;
    $scripts = <<<EOF
    var images = [];
    var index = 0;
    $(document).ready(function(){
    window.setInterval(nextPhoto,5000);
    $.ajax({
        dataType: "json",
        url: "photos.php?images=get",
        success: function(data, status, jqXHR){
            $.each(data, function(key, val){
                images.push(val);
            })
            displayImages();
        }
    });
    $('#photoviewer').hover(function(){
        $('#forward').removeClass('dim');
        $('#back').removeClass('dim');
    },function(){
        $('#back').addClass('dim');
        $('#forward').addClass('dim');
    });
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
    var canPressNext = true;
    function nextPhoto(){
        if(canPressNext){
            if(index + 1 < images.length)
                index++;
            else
                index = 0;
            viewPhoto();
        }
    }
    function prevPhoto(){
        if(canPressNext){
            if(index - 1 >= 0)
                index--;
            else
                index = images.length - 1;
            viewPhoto();
        }
    }
    function viewPhoto(){
        var photo = $('#photo img');
        canPressNext = false;
        photo.fadeOut(200,function(){
            photo.attr("src", images[index]);
        }).fadeIn(200,function(){
            canPressNext = true;
        });

    }
EOF;
    $content = <<<EOF
    <div class="group">
        <h2>Photography</h2>
        <div class="groupcontent">
            <div id="photoviewer">
                <div id="forward" class="photobuttons disable-select dim" onclick="nextPhoto()">
                    <div>
                    >
                    </div>
                </div>
                <div id="back" class="photobuttons disable-select dim" onclick="prevPhoto()">
                    <div>
                    <
                    </div>
                </div>
                <div id="photo">
                </div>
            </div>
        </div>
    </div>
    <div class="group">
        <h2>Facebook Page</h2>
        <div class="subsection">
            Please like my Facebook Page to keep yourself updated.
        </div>
        <div class="subsection">
            <a class="button" href="https://www.facebook.com/gwcphotography/">Click here :)</a>
        </div>
    </div>
EOF;

}
include($_SERVER['DOCUMENT_ROOT'] ."\\php\\template.php");
?>
