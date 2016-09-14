function name_validate(text) {
    var x = text.charAt(0);
    if("A" <= x && x <= "Z") {
        return true;
    }
    return false;
}
function form_validate_school() {
    var number = document.forms["application"]["number"].value;
    var cnumber = document.forms["application"]["cnumber"].value;
    var uid = document.forms["application"]["uid"].value;
    
    //Participation size validation
    if(number == null || number == "" || parseInt(number) >= 30) {
        alert("Invalid participation size. Participation size is inclusive of number of faculty advisors and should be less than 30.");
        return false;
    }
    
    //Unique id validation
    if(uid == null || uid == "" || uid.length != 5 || uid.charAt(0) != "S") {
        alert("Invalid unique id. Please make sure that you have entered the valid unique id that has been provided to your school by our team.");
        return false;
    }
    
    //Contact number validation
    if(cnumber == null || cnumber == "" || cnumber.length != 10) {
        alert("Invalid contact number. Contact number should comprise exactly of 10 digits.");
        return false;
    }
    
}
function form_validate_participant() {
    var inputNames = document.querySelectorAll("input#name");
    for(var i = 0; i < inputNames.length; i++) {
        var name = inputNames[i].value;
        if(!name_validate(name) || name == null || name == "") {
            alert("Invalid participant name. Participant name should always begin with a capital letter.");
            return false;
        }
    }
    return true;
}