// SignUp Modal Validation
function validation (){
    const username = document.querySelector('#s_username').value;
    const password = document.querySelector('#s_password').value;
    const mobile = document.querySelector('#mobile').value;
    const fullname = document.querySelector('#fullname').value;
    // Validate Username: Must contain at least 1 special character, 3 digits, and a minimum length of 8
    const usernameRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z0-9!@#$%^&*]{3,}$/;
    // const digitCount = (username.match(/\d/g) || []).length;

    let alertstr="";
    if (!usernameRegex.test(username)) {
        alertstr += "Username must be of at least 3 characters long, must contain alphabetic and numeric characters, may or may not be contain special characters.\n\n";
    }

    // Validate Password: Must contain 1 special character, 4 digits, and 3 characters
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z0-9!@#$%^&*]{3,}$/;
    if (!passwordRegex.test(password)){
        alertstr += "Password must be of at least 3 characters long, must contain alphabetic and numeric characters, may or may not be contain special characters.\n\n";
    }

    // Validate Mobile Number: Must be 10 digits
    const mobileRegex = /^[0-9]{10}$/;
    if (!mobileRegex.test(mobile)) {
        alertstr += "Mobile Number Must be of Only 10 Digit.\n\n";
    }

    const fullnameRegex = /^[A-Za-z]+ [A-Za-z]+ [A-Za-z]+$/;
    if (!fullnameRegex.test(fullname)) {

        alertstr += "Full Name must contain exactly 3 words, no numbers or special characters, and separated by exactly two white spaces.";
    }

    // If all validations pass
    if(alertstr == "")
    {
        return true;
    }
    else{
        alert(alertstr);
    }
    return false;
    // Here, you can proceed with form submission or modal close
};

// Login Modal Validation
function login_validation()
{
    const username = document.querySelector('#l_username').value;
    const password = document.querySelector('#l_password').value;
    const usernameRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z0-9!@#$%^&*]{3,}$/;
    // const digitCount = (username.match(/\d/g) || []).length;

    let alertstr="";
    if (!usernameRegex.test(username)) {
        alertstr += "Username must be of at least 3 characters long, must contain alphabetic and numeric characters, may or may not be contain special characters.\n";
    }

    // Validate Password: Must contain 1 special character, 4 digits, and 3 characters
    const passwordRegex = /^(?=.*[A-Za-z])(?=.*\d)[A-Za-z0-9!@#$%^&*]{3,}$/;
    if (!passwordRegex.test(password)){
        alertstr += "Password must be of at least 3 characters long, must contain alphabetic and numeric characters, may or may not be contain special characters.\n";
    }

     // If all validations pass
    if(alertstr == "")
    {
        return true;
    }
    else{
        alert(alertstr);
    }
    return false;
}
