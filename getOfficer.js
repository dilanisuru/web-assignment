function viewProfile() {
    var nic=document.getElementById("searchNic").value;
 
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            //alert(this.responseText);
            myObj = JSON.parse(this.responseText);
            success = myObj.success;
            oid = myObj.oid;
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
            document.getElementById("oid").value = oid;
            document.getElementById("dOid").value = oid;
            document.getElementById('dpImg').src = "php/uploads/Officer/" + oid + '.jpg'
            document.getElementById("nic").value = nic;
            //document.getElementById("gen").innerHTML = gender;
            document.getElementById("contactNo").value = contactNo;
            document.getElementById("dob").value = dob;
            document.getElementById("address").innerHTML = address;
            //document.getElementById("dpImg").innerHTML = address;
            //alert("sefs");
        }
    };
    xmlhttp.open("GET", "php/getOfficer.php?nic="+nic, true);
    xmlhttp.send();
}