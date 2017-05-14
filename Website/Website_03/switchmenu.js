function switchmenu(obj){
        if(document.getElementById){
        var el = document.getElementById(obj);
        var ar = document.getElementById("maindiv").getElementsByTagName("span"); 
                if(el.style.display != "block"){
                        for (var i=0; i<ar.length; i++){
                                if (ar[i].className=="submenu") 
                                ar[i].style.display = "none";
                        }
                        el.style.display = "block";
                }else{
                        el.style.display = "none";
                }
        }
}