var rev = "fwd";
function judulBergoyang(val)
{
	var msg  = "SDN SUKAASIH 1";
	var res = " ";
	var speed = 150;
	var pos = val;

	msg = "SDN SUKAASIH 1";
	var le = msg.length;
	if(rev == "fwd"){
		if(pos < le){
		pos = pos+1;
		scroll = msg.substr(0,pos);
		document.title = scroll;
		timer = window.setTimeout("judulBergoyang("+pos+")",speed);
		}
		else{
		rev = "bwd";
		timer = window.setTimeout("judulBergoyang("+pos+")",speed);
		}
	}
	else{
		if(pos > 0){
		pos = pos-1;
		var ale = le-pos;
		scrol = msg.substr(ale,le);
		document.title = scrol;
		timer = window.setTimeout("judulBergoyang("+pos+")",speed);
		}
		else{
		rev = "fwd";
		timer = window.setTimeout("judulBergoyang("+pos+")",speed);
		}	
	}
}
judulBergoyang(0);