function logout(){
    deleteCookie("userLogedIn");
    let location = new String(window.location)
    if(location.includes("pages")){
        window.location="../";
    }else{
        window.location=".";
    }
     
}
function deleteCookie(name) {
    document.cookie = name+"=; expires=Thu, 01 Jan 1970 00:00:00 UTC;path=/;"
}

function goToPage(page){
    let location = new String(window.location)
    if(page==="index.php"){
        logout();
    }else{
        let uri = "";
        if(location.includes("pages")){
            uri = page;
        }else{
            uri = "pages/"+page;
        }
        window.location=uri;
    }
   
}