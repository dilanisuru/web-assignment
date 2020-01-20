function viewProfile() {
    var cid=document.getElementById("searchCid").value;
    
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
           myObj = JSON.parse(this.responseText);
            success = myObj.success;
            cid = myObj.cid;
            oDate = myObj.oDate;
            des = myObj.description;
            caseProcess = myObj.caseProcess;
            ineStDate = myObj.ineStDate;
            suspect = myObj.suspect;
            officer = myObj.officer;
            
       
            //document.getElementById("cid").checked=true;
            
            document.getElementById("cid").value = cid;
            document.getElementById("oDate").value = oDate;
            //document.getElementById('profileImg').src = "php/uploads/profile/" + uniId + '.jpg'
            document.getElementById("des").innerHTML = des;
            document.getElementById("caseProcess").innerHTML = caseProcess;
            document.getElementById("ineStDate").value = ineStDate;
            document.getElementById("suspects").innerHTML = suspect;
            document.getElementById("officers").innerHTML = officer;
            //alert("sefs");
        }
    };
    xmlhttp.open("GET", "php/getCase.php?cid="+cid, true);
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