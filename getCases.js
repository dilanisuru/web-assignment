function viewCases() {
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
         //alert( this.responseText);
       
            //document.getElementById("cid").checked=true;
            
            document.getElementById("cases").innerHTML = this.responseText;
           
        }
    };
    xmlhttp.open("GET", "php/getCases.php", true);
    xmlhttp.send();
}

function postSuspect(){
    var cid=document.getElementById("cid").value;
   
          $.post("php/addSuspect.php",
          {
            cid: cid,
            suspect: document.getElementById("suspect").value
          },
          function(data,status){
            alert("Done")
              if (data==1) alert("Done");
            else alert("Error");
            document.getElementById('id01').style.display='none'
          });
      
}

function postOfficer(){
    var cid=document.getElementById("cid").value;
   
          $.post("php/addOfficer.php",
          {
            cid: cid,
            officer: document.getElementById("officer").value
          },
          function(data,status){
              //alert(data);
              if (data==1) alert("Done");
            else alert("Error");
            document.getElementById('id02').style.display='none'
          });
      
}


function deleteCase(){
  alert("data");
  var cid=document.getElementById("cid").value;
 
        $.post("php/deleteCase.php",
        {
          cid: cid
       
        },
        function(data,status){
            alert(data);
            //if (data==1) alert("Done");
          //else alert("Error");
          //document.getElementById('id02').style.display='none'
        });
    
}