$(document).ready( function() {

    takePicture();
    listImages();
    
});

function listImages()
{
    $.getJSON('/getimages.php', function( json ) {
        var $picContainer = $('#pics');
        var arrayImg = [];
        for(var i in json){
            var img = json[i];
            img._w = 240;
            img._h = 180;
            arrayImg.push( buildimg(img) );
        }
        $picContainer.html('').append(arrayImg.join(''));
        $picContainer.fadeTo(1);
    });
}
     
function xlistImages()
{
    $.getJSON('/getimages.php', function( json ) {
            
        var pics = json;
        var rowWidth = 1000;
        var spacing = 6;

        var b = 0, e = 0, rowHeight;
        while (e < pics.length) {
            do {
                e++;

                var totalWidth = 0;
                for (var i = b; i < e; i++)
                    totalWidth += pics[i].w / pics[i].h;

                rowHeight = Math.round((rowWidth - spacing * (e - b)) / totalWidth);
            } while (rowHeight > 200 && e < pics.length);

            var actualRowWidth = 0;
            for (var i = b; i < e; i++) {
                pics[i]._w = Math.round(pics[i].w / pics[i].h * rowHeight);
                pics[i]._h = rowHeight;
                actualRowWidth += pics[i]._w;
            }

            var diff = (rowWidth - spacing * (e - b)) - actualRowWidth;
            var per = Math.floor(diff / (e - b));
            var extra = diff % (e - b);
            if (extra < 0) extra += e - b;
            for (var i = b; i < e; i++) {
                pics[i]._w += per;
                if (i - b < extra) pics[i]._w++;
            }

            var rowDiv = $('<div></div>')
                .addClass('row')
                .appendTo('#container');

            for (var i = b; i < e; i++) {
                var pic = $('<div></div>')
                    .addClass('pic')
                    .css( { width: pics[i]._w, height: pics[i]._h } )
                    .appendTo(rowDiv);

                var picContainer = $('<div></div>')
                    .addClass('pic-container');

                var img = $(buildimg(pics[i]))
                    .load( function() {
                        $(this).parents('.pic-container').fadeIn(800, function() {
                            $(this).parent().addClass('pic-hover');
                        } );
                    } );

                picContainer
                    .html(img)
                    .wrapInner('<a href="pic/' + pics[i].src + '" />');

                pic.append(picContainer).appendTo(rowDiv);
            }

            b = e;
        }
    });
}



function buildimg(pic) {
    return (
        '<img ' +
        'src="pic/' + pic.id + '/' + pic._w + 'x' + pic._h + '/' + pic.src + '" ' +
        'width="' + pic._w + '" ' +
        'height="' + pic._h + '" ' +
        '/>');
}

function takePicture()
{
    // Put event listeners into place
    window.addEventListener("DOMContentLoaded", function() {
        // Grab elements, create settings, etc.
        var canvas = document.getElementById("canvas");

        if(!canvas){
            return;
        }

        var    context = canvas.getContext("2d"),
            video = document.getElementById("video"),
            videoObj = { "video": true },
            errBack = function(error) {
                console.log("Video capture error: ", error.code); 
            };

        // Put video listeners into place
        if(navigator.getUserMedia) { // Standard
            navigator.getUserMedia(videoObj, function(stream) {
                video.src = stream;
                video.play();
            }, errBack);
        } else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
            navigator.webkitGetUserMedia(videoObj, function(stream){
                video.src = window.webkitURL.createObjectURL(stream);
                video.play();
            }, errBack);
        } else if(navigator.mozGetUserMedia) { // WebKit-prefixed
            navigator.mozGetUserMedia(videoObj, function(stream){
                video.src = window.URL.createObjectURL(stream);
                video.play();
            }, errBack);
        }

        // Trigger photo take
        document.getElementById("snap").addEventListener("click", function(){

            $('#pics').fadeTo(0.5);

            context.drawImage(video, 0, 0, 640, 480);
            var imgBase64 = canvas.toDataURL("image/png");
            $.post('/saveimage.php', { img: imgBase64 }, function(){
                setTimeout(listImages(), 1000);
            });
        });
    }, false);

}


// var count=3;

// //var counter=setInterval(timer, 1000); //1000 will  run it every 1 second

// function timer(context, canvas)
// {
//     count=count-1;
//     if (count <= 0)
//     {
//         clearInterval(counter);
//         //counter ended, do something here
        
//         return;
//     }

//     //Do code for showing the number of seconds here
//     document.getElementById("timer").innerHTML=count + " secs"; // watch for spelling

// }