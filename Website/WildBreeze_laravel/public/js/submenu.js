// ----------------------------------------------
// *** submenu *** Start
// ----------------------------------------------


    var old_menu = '';
    var old_cell = '';
    function menuclick( submenu ,cellbar){
        if( old_menu != submenu ) {
            if( old_menu !='' ) {
                old_menu.style.display = 'none';
            }
                submenu.style.display = 'block';
				old_menu = submenu;
                old_cell = cellbar;
    } 
            else {
                submenu.style.display = 'none';
                old_menu = '';
                old_cell = '';
            }
	}

var IElayers;
if (document.all) { IElayers = 0;}
else if (document.layers) { IElayers = 1; }
else if (!document.all && document.getElementById) { IElayers = 2; }
var currentLayer = "";
var currentSubLayer = "";
var currentFeature = "";
var notLoaded=true;



function show(id,reset) {
	if (notLoaded!=true) { 
		if (currentLayer != "") { hide(currentLayer); }
		if (IElayers == 2) {
			document.getElementById(id).style.visibility = "visible";
			document.getElementById(id).style.visibility = "visible";
			}
		else if (IElayers == 1) {
			document.layers[id].visibility = "show";
			document.layers[id].visibility = "show";
			}
		else if (IElayers == 0) {
			document.all[id].style.visibility = "visible";
			document.all[id].style.visibility = "visible";
			}
		if (reset=="yes") {
			if (IElayers == 2) {
				document.getElementById("menuReset").style.visibility = "visible";
				document.getElementById("menuReset").style.visibility = "visible";
				}
			else if (IElayers == 1) {
				document.layers["menuReset"].visibility = "show";
				document.layers["menuReset"].visibility = "show";
				}
			else if (IElayers == 0) {
				document.all["menuReset"].style.visibility = "visible";
				document.all["menuReset"].style.visibility = "visible";
				}
		}
        currentLayer = id;
	}
}

function hide(id) {
	if (notLoaded!=true) { 
		if (IElayers == 2) {
			document.getElementById(id).style.visibility = "hidden";
			document.getElementById(id).style.visibility = "hidden";
			}
		else if (IElayers == 1) {
			document.layers[id].visibility = "hide";
			document.layers[id].visibility = "hide";
			}
		else if (IElayers == 0) {
			document.all[id].style.visibility = "hidden";
			document.all[id].style.visibility = "hidden";
			}
	}
}

function hideMenus() {
	if (notLoaded!=true) { 
	if (currentLayer!="") { hide(currentLayer); }
	if (currentSubLayer!="") { hide(currentSubLayer); }
	hide("menuReset");
	currentLayer="";
	currentSubLayer="";
	}
}

function hideSubMenus() {
	if (notLoaded!=true) { 
	if (currentSubLayer!="") { hide(currentSubLayer); }
	currentSubLayer="";
	}
}
	
function showMenu(id,reset) {
	if (notLoaded!=true) { 
		if (currentLayer != "") { hide(currentLayer); }
		if (IElayers == 2) {
			document.getElementById(id).style.visibility = "visible";
			document.getElementById(id).style.visibility = "visible";
			}
		else if (IElayers == 1) {
			document.layers[id].visibility = "show";
			document.layers[id].visibility = "show";
			}
		else if (IElayers == 0) {
			document.all[id].style.visibility = "visible";
			document.all[id].style.visibility = "visible";
			}
		if (reset=="yes") {
			if (IElayers == 2) {
				document.getElementById("menuReset").style.visibility = "visible";
				document.getElementById("menuReset").style.visibility = "visible";
				}
			else if (IElayers == 1) {
				document.layers["menuReset"].visibility = "show";
				document.layers["menuReset"].visibility = "show";
				}
			else if (IElayers == 0) {
				document.all["menuReset"].style.visibility = "visible";
				document.all["menuReset"].style.visibility = "visible";
				}
		}
        currentLayer = id;
	}
}

function showSubMenu(id,reset) {
	if (notLoaded!=true) { 
		if (currentSubLayer != "") { hide(currentSubLayer); }
		if (IElayers == 2) {
			document.getElementById(id).style.visibility = "visible";
			document.getElementById(id).style.visibility = "visible";
			}
		else if (IElayers == 1) {
			document.layers[id].visibility = "show";
			document.layers[id].visibility = "show";
			}
		else if (IElayers == 0) {
			document.all[id].style.visibility = "visible";
			document.all[id].style.visibility = "visible";
			}
		if (reset=="yes") {
			if (IElayers == 2) {
				document.getElementById("menuReset").style.visibility = "visible";
				document.getElementById("menuReset").style.visibility = "visible";
				}
			else if (IElayers == 1) {
				document.layers["menuReset"].visibility = "show";
				document.layers["menuReset"].visibility = "show";
				}
			else if (IElayers == 0) {
				document.all["menuReset"].style.visibility = "visible";
				document.all["menuReset"].style.visibility = "visible";
				}
		}
        currentSubLayer = id;
	}
}


// ----------------------------------------------
// *** submenu *** End
// ----------------------------------------------