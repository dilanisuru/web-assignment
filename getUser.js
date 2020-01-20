function viewUsers() {
    //alert("sefs");
    var xmlhttp = new XMLHttpRequest();
    
    xmlhttp.onreadystatechange = function() {
       //alert(this.status); 
        if (this.readyState == 4 && this.status == 200) {
           
           //alert(this.responseText);
            myObj = this.responseText;
       
            document.getElementById("tblContent").innerHTML = myObj;
            //document.getElementById("dpImg").innerHTML = address;
            //alert("sefs");
        }
    };
    xmlhttp.open("GET", "php/getUser.php", true);
    xmlhttp.send();
}

//alert("sefs");