function auth(){
    var password = prompt('Ingrese su contraseña');
    if(password != ".fiscalia.")
        auth();
}

auth();