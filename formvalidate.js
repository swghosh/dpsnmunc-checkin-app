// checks whether the name passed in argument starts in capital or not
function nameValidate(text) {
    var x = text.charAt(0);
    // a valid legal name always starts in a capital letter
    if("A" <= x && x <= "Z") {
        return true;
    }
    return false;
}

// performs validation on the form in the homepage
function formValidateSchool() {
    var number = document.forms["application"]["number"].value;
    var cnumber = document.forms["application"]["cnumber"].value;
    var uid = document.forms["application"]["uid"].value;
    
    // Participation size validation
    if(number == null || number == "" || parseInt(number) >= 30 || parseInt(number) <= 0) {
        alert("Invalid participation size. Participation size is inclusive of number of faculty advisors and should be less than 30.");
        return false;
    }
    
    // Unique id validation
    if(uid == null || uid == "" || uid.length != 5 || uid.charAt(0) != "S") { 
        // a valid unique id begins in 'S' and has exactly 5 characters
        alert("Invalid unique id. Please make sure that you have entered the valid unique id that has been provided to your school by our team.");
        return false;
    }
    
    // Contact number validation
    if(cnumber == null || cnumber == "" || cnumber.length != 10) {
        // a valid contact number comprises 10 digits
        alert("Invalid contact number. Contact number should comprise exactly of 10 digits.");
        return false;
    }
    
}

// performs validation of the participant names on the second form
function formValidateParticipant() {
    var inputNames = document.querySelectorAll("input#name");
    
    // validates each participant name
    for(var i = 0; i < inputNames.length; i++) {
        var name = inputNames[i].value;
        // checks whether name is invalid or null
        if(!nameValidate(name) || name == null || name == "") {
            alert("Invalid participant name. Participant name should always begin with a capital letter.");
            return false;
        }
    }
    return true;
}

// displays error message upon uid mismatch
function uidMismatch() {
    alert("The unique id that you've provided doesn't match the id that have been assigned to your school. Please make sure that you have entered the valid unique id that has been provided to your school by our team.");
}