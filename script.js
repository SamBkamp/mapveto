
var xhttp = new XMLHttpRequest();

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
    console.log("updating");
}

$(".del").click(function(){
    alert( this.id );
    var image = jQuery(this).children("img");
    image.attr("src", "ban.png");
    this.css("background-image", "url(ban.png)"); 
});

$(".del").hover(function(){
    var image = jQuery(this).children("img");
    image.attr("src", "ban.png");
}, function(){
    var image = jQuery(this).children("img");
    image.attr("src", this.id + ".png");
});


