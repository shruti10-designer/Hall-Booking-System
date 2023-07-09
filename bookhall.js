document.addEventListener("DOMContentLoaded", () => {
  console.log("Hello World!");
 
    elem = document.getElementById("eventdate");
	// var iso= date("Y-m-d\TH:i:s", strtotime(new Date()));
    var iso = new Date().toISOString();
	//var trydt = formatDate(iso, "YYYY-MM-DD hh:mm:ss")
    var minDate = iso.slice(0, 16); //(0,iso.length-1);
    elem.value = minDate
    elem.min = iso
});
	