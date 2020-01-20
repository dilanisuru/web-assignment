function viewProfile() {
    var nic=document.getElementById("searchNic").value;
 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            
            myObj = JSON.parse(this.responseText);
            success = myObj.success;
            sid = myObj.sid;
            name = myObj.name;
            nic = myObj.nic;
            contactNo = myObj.contactNo;
            gender = myObj.gender;
            dob = myObj.dob;
            address = myObj.address;
            
            if (gender =="Male"){
                document.getElementById("genMale").checked=true
            }
            if (gender =="Female"){
                document.getElementById("genFemale").checked=true;
            }
      
            document.getElementById("name").value = name;
            document.getElementById("sid").value = sid;
            document.getElementById('dpImg').src = "php/uploads/Suspect/" + sid + '.jpg'
            //document.getElementById("gen").innerHTML = gender;
            document.getElementById("contactNo").value = contactNo;
            document.getElementById("nic").value = nic;
            document.getElementById("dob").value = dob;
            document.getElementById("address").innerHTML = address;
            //alert("sefs");
        }
    };
    xmlhttp.open("GET", "php/getSuspect.php?nic="+nic, true);
    xmlhttp.send();
}

function deleteSuspect(){
    
    var sid=document.getElementById("sid").value;
    //alert(sid);
          $.post("php/deleteSuspect.php",
          {
            sid: sid
         
          },
          function(data,status){
              alert(data);
              //if (data==1) alert("Done");
            //else alert("Error");
            //document.getElementById('id02').style.display='none'
          });
      
  }