//reset forms to clear

function clearForm(formName){
    let inputs = document.forms[formName].getElementsByTagName("input");
    inputs.forEach(input => {
        if(input.type == "text" || input.type == "password"){
            input.value = "";
        }
    });
}