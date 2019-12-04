function calculateTotal(items_array){
	
	
}

function openPage(pageName,elmnt) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

function searchPanel(){
	panel = document.getElementById("test");
	panel.style.visibility = "visible";

}

function filler(){
		panel = get()
		panel.style.visibility = "hidden";
	
	
}

function test(){
	var array;
	$.ajax({
    type: "POST",
    url: 'salespage.php',
    dataType: 'json',
    data: {functionname: 'getMatchingCustomers', arguments: ['d']},
    success: function(obj){array = obj.result}					    
	});
	document.write(array[0]);
}