function CheckD()
{	var d1=document.getElementById("suru").value;
	var d2=document.getElementById("endl").value;
	alert("rar");
}
function No_of_days()
{
	 var date1 = new Date(document.getElementById("suru").value); 
var date2 = new Date(document.getElementById("endl").value); 
  
 
var Difference_In_Time = date2.getTime() - date1.getTime(); 
  
var Difference_In_Days = Difference_In_Time / (1000 * 3600 * 24); 

var str1="<label style="+"color:#4b4276"+"> Kindly grant me  "+Difference_In_Days+" days leave.</label><br></br>"
if(Difference_In_Days>0)
document.getElementById("diff").innerHTML="&nbsp&nbsp&nbsp&nbsp<input type="+"checkbox"+"></input>"+str1;
else
document.getElementById("diff").innerHTML="&nbsp&nbsp&nbsp&nbsp<label style="+"color:red"+"> Invalid dates.</label><br></br>"

}
