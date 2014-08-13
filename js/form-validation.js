window.onload = init;
 
// The "onload" handler. Run after the page is fully loaded.
function init() {
   // Attach "onsubmit" handler
   //document.getElementById("regForm").onsubmit = validateForm;
   // Attach "onclick" handler to "reset" button
   document.getElementById("reset").onclick = clearDisplay;
   // Set initial focus
   document.getElementById("select").focus();
}
 
/* The "onsubmit" handler to validate the input fields.
 * Most of the input validation functions take 2 arguments:
 * inputId or inputName: the "id" of the <input> element to be validated
 *   or "name" for checkboxes and radio buttons.
 * errorMsg: the error message to be displayed if validation fails.
 *   The message shall be displayed on an element with id of
 *   inputID+"Error" if it exists; otherwise via an alert().
 */
function validateForm() {
   if(document.getElementById('radPresenter').checked){
   return (isNotEmpty("inputFirstName", "fNameDiv", "Please enter your first name")
        && isNotEmpty("inputLastName", "lNameDiv", "Please enter your last name")
        && isNotEmpty("inputEmail", "emailDiv", "Please enter an email address")
        && isNotEmpty("inputEmailConf", "emailConfDiv", "Please confirm your email address")
        && isValidEmail("inputEmail", "emailDiv", "Please enter a valid email")
        && isLengthMinMax("textComments", "commentDiv" ,"500 word limit", 0, 506)
        && isLengthMinMax("textAbstract", "abstractDiv", "1000 word limit", 0, 1006)
        && verifyEmail("inputEmail", "inputEmailConf", "emailConfDiv", "Email Addresses don't match")
        && isNotEmpty("inputTitle", "titleDiv", "Please enter a title for your abstract")
        && isNotEmpty("textAbstract", "abstractDiv", "Please enter an abstract"));
   } else {
      return (isNotEmpty("inputFirstName", "fNameDiv", "Please enter your first name")
        && isNotEmpty("inputLastName", "lNameDiv", "Please enter your last name")
        && isNotEmpty("inputEmail", "emailDiv", "Please enter an email address")
        && isNotEmpty("inputEmailConf", "emailConfDiv", "Please confirm your email address")
        && isValidEmail("inputEmail", "emailDiv", "Please enter a valid email")
        && isLengthMinMax("textComments", "commentDiv" ,"500 word limit", 0, 500)
        && isLengthMinMax("textAbstract", "abstractDiv", "1000 word limit", 0, 1000)
        && verifyEmail("inputEmail", "inputEmailConf", "emailConfDiv", "Email Addresses don't match"));
   }

}
 
// Return true if the input value is not empty
function isNotEmpty(inputId, divID, errorMsg) {
   var inputElement = document.getElementById(inputId);
   var divElement = document.getElementById(divID);
   var errorElement = document.getElementById(inputId + "Error");
   var inputValue = inputElement.value.trim();
   var isValid = (inputValue.length !== 0);  // boolean
   showMessage(isValid, inputElement, divElement, errorMsg, errorElement);
   return isValid;
}
 
/* If "isValid" is false, print the errorMsg; else, reset to normal display.
 * The errorMsg shall be displayed on errorElement if it exists;
 *   otherwise via an alert().
 */
function showMessage(isValid, inputElement, divElement, errorMsg, errorElement) {
   if (!isValid) {
      // Put up error message on errorElement or via alert()
      if (errorElement !== null) {
         errorElement.innerHTML = errorMsg;
      } else {
         alert(errorMsg);
      }
      // Change "class" of inputElement, so that CSS displays differently
      if (inputElement !== null && divElement.className !== "form-group has-error") {
         divElement.className = "form-group has-error";
         inputElement.focus();
      }
   } else {
      // Reset to normal display
      if (errorElement !== null) {
         errorElement.innerHTML = "";
      }
      if (inputElement !== null) {
         divElement.className = "form-group";
      }
   }
}

//Count the number of words in a string
function WordCount(str) { 

   return str.split(" ").length;

} 


// Return true if the input length is between minLength and maxLength
function isLengthMinMax(inputId, divId, errorMsg, minLength, maxLength) {
   var inputElement = document.getElementById(inputId);
   var divElement = document.getElementById(divId);
   var errorElement = document.getElementById(inputId + "Error");
   var inputValue = WordCount(inputElement.value.trim());
   alert(inputValue);
   var isValid = (inputValue >= minLength && inputValue <= maxLength);
   showMessage(isValid, inputElement, divElement, errorMsg, errorElement);
   return isValid;
}
 
// Return true if the input value is a valid email address
// (For illustration only. Should use regexe in production.)
function isValidEmail(inputId, divID, errorMsg) {
   var inputElement = document.getElementById(inputId);
   var divElement = document.getElementById(divID);
   var errorElement = document.getElementById(inputId + "Error");
   var inputValue = inputElement.value;
   var isValid = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,4}$/.test(inputValue);
   showMessage(isValid, inputElement, divElement, errorMsg, errorElement);
   return isValid;
}
 
// Return true if selection is made (not default of "") in <select> input
function isSelected(inputId, errorMsg) {
   var inputElement = document.getElementById(inputId);
   var errorElement = document.getElementById(inputId + "Error");
   var inputValue = inputElement.value;
   // You need to set the default value of <select>'s <option> to "".
   var isValid = inputValue !== "";
   showMessage(isValid, inputElement, errorMsg, errorElement);
   return isValid;
}
 
// Return true if the one of the checkboxes or radio buttons is checked
function isChecked(inputName, errorMsg) {
   var inputElements = document.getElementsByName(inputName);
   var errorElement = document.getElementById(inputName + "Error");
   var isChecked = false;
   for (var i = 0; i < inputElements.length; i++) {
      if (inputElements[i].checked) {
         isChecked = true;  // found one element checked
         break;
      }
   }
   showMessage(isChecked, null, errorMsg, errorElement);
   return isChecked;
}
 
// Verify password. The password is kept in element with id "pwId".
// The verified password in id "verifiedPwId".
function verifyEmail(emailId, verifiedEmailId, divID, errorMsg) {
   var emailElement = document.getElementById(emailId);
   var verifiedEmailElement = document.getElementById(verifiedEmailId);
   var divElement = document.getElementById(divID);
   var errorElement = document.getElementById(verifiedEmailId + "Error");
   var isTheSame = (emailElement.value === verifiedEmailElement.value);
   showMessage(isTheSame, verifiedEmailElement, divElement, errorMsg, errorElement);
   return isTheSame;
}
 
// The "onclick" handler for the "reset" button to clear the display
function clearDisplay() {
   var elms = document.getElementsByTagName("*");  // all tags
   for (var i = 0; i < elms.length; i++) {
      if ((elms[i].id).match(/Error$/)) {  // no endsWith() in JS?
         elms[i].innerHTML = "";
      }
      if (elms[i].className === "error") {  // assume only one class
         elms[i].className = "";
      }
   }
   // Set initial focus
   document.getElementById("name").focus();
}