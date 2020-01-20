  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //alert(this.responseText);
           
          
           
            document.getElementById("suspect").innerHTML = this.responseText;
            //alert("sefs");
        }
    };
    xmlhttp.open("GET", "php/getSuspectList.php", true);
    xmlhttp.send();

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //alert(this.responseText);
           
          
           
            document.getElementById("officer").innerHTML = this.responseText;
            //alert("sefs");
        }
    };
    xmlhttp.open("GET", "php/getOfficerList.php", true);
    xmlhttp.send();

