// 1 detik = 1000  
window.setTimeout("waktu()",1000);    
function waktu() {     
	var tanggal = new Date();    
	setTimeout("waktu()",1000);    
	document.getElementById("watu").innerHTML = tanggal.getHours()+":"+tanggal.getMinutes()+":"+tanggal.getSeconds();  
	}  