
var xhttp = new XMLHttpRequest();
var xhttpL = new XMLHttpRequest();
var change = false;

$("#input").keydown(function(event){ 
    if (event.which == 13 && $("#input").val()!=""){
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                $("#chatRoom").html(this.responseText);
                $("#input").val("");
                var elem = document.getElementById('chatRoom');
                elem.scrollTop = elem.scrollHeight;
            }
        };
        xhttp.open("GET", "live.php?pay=" + $("#input").val(), true);
        xhttp.send();
    }else {
    }
});

setInterval(send, 1000);

function send(){
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            $("#chatRoom").html(this.responseText);
            var elem = document.getElementById('chatRoom');
            elem.scrollTop = elem.scrollHeight;
        }
    };
    xhttp.open("GET", "live.php?pay=", true);
    xhttp.send();
    getmaps("empty");
}

function getmaps(data){
    xhttpL.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var array = this.responseText.split(',');
            console.log(this.responseText);
            turn = array[0];
            if (turn == "true"){
                $("#turn").text("its your turn");
                $(".del").css("cursor", "pointer");
            }else if(turn == "false") {
                $("#turn").text("its the opponents turn");
                $(".del").css("cursor", "not-allowed");
            }else if(turn == "end"){
                $("#turn").text("setting up the server...");
                $(".del").css("cursor", "not-allowed");
            }else {
                $("#turn").text("waiting..");
                $(".del").css("cursor", "not-allowed");
            }
            for (i=1; i<array.length-1; i++){
                
                var toChange = jQuery("#" + array[i]).children("img");
                toChange.attr("src", "media/"+ array[i] + "-ban.png");
                toChange.attr("method", "post");
            }
            
        }
    };
    xhttpL.open("GET", "live.php?maps=" + data, true);
    xhttpL.send();
}

$(".del").click(function(){
    var image = jQuery(this).children("img");
    if (image.attr("method") == "post"){

    }else {
        if (turn == "true"){
            getmaps(this.id);
            image.attr("method", "post");
            image.attr("src", "media/"+ this.id + "-ban.png");
            turn = "false";
        }
    }
    
    

});

$(".del").hover(function(){
    if (turn == "true"){
        var image = jQuery(this).children("img");
        image.attr("src", "media/"+ this.id + "-ban.png");
    }
}, function(){
    var image = jQuery(this).children("img");
    if (image.attr("method") == "get"){
        image.attr("src", "media/"+ this.id + ".png");
        
    }else {
    }
});


