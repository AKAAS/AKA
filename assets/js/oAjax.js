function createObjectAjax(){
	var v_brow = false;
	try{
		v_brow = new ActiveXObject('MXXML2.XMLHTTP');
	}catch(e){
		try{
		v_brow = new ActiveXObject('Microsoft.XMLHTTP');	
		}catch(e2){
		v_brow = false;
		}
	}
	if(!v_brow && typeof XMLHttpRequest !='undefined'){
		v_brow = new XMLHttpRequest();
	}
	if(!v_brow){
		window.alert('Browser anda versi lama/Javascript masih off');
	}else{
		window.alert('Connect');
	}
	return v_brow;
}