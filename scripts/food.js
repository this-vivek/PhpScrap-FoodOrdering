
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
function calprice() 
{
 var x1=0;
 var x2=0;
 var x3=0;
 var x4=0;
 var x5=0;
 var x6=0;
 var x7=0;
 var x8=0;
 var x9=0;
 var x10=0;
 var x11=0;
 var x12=0;
  var a1="";
 var a2="";
 var a3="";
 var a4="";
 var a5="";
 var a6="";
 var a7="";
 var a8="";
 var a9="";
 var a10="";
 var a11="";
 var a12="";
 var x=0;
var y=0;
var t="";
var name=" ";
var t2;

if(document.getElementById("check1").checked==true)
{
 x1= parseInt(document.getElementById("food1").value);
a1=document.getElementById("check1").value;
 y+=x1;

 
  }
 else if(x1>0)
  {
	  if(document.getElementById("check1").checked==false)
{
	x1= parseInt(document.getElementById("food1").value);
	a1=document.getElementById("check1").value;
	y-=x1;
	a1=null;
  x1=null;
  }
  }
   
 
  

if(document.getElementById("check2").checked==true)
{
 x2= parseInt(document.getElementById("food2").value);
a2=document.getElementById("check2").value;
 y+=x2;

  }
  
 else if(x2>0)
  {
	 if(document.getElementById("check2").checked==false)
{
 x2= parseInt(document.getElementById("food2").value);
	a2=document.getElementById("check2").value;
	y-=x2;
	a2=null;
	x2=null;
  }
  }
   
 
  

if(document.getElementById("check3").checked==true)
{
 x3= parseInt(document.getElementById("food3").value);
a3=document.getElementById("check3").value;
 y+=x3;
 
  }
 else if(x3>0)
  {if(document.getElementById("check3").checked==false)
{
 x3= parseInt(document.getElementById("food3").value);
	a3=document.getElementById("check3").value;
	y-=x3;
	a3=null;
	x3=null;
  }
	  
  }
  
   
 
  

if(document.getElementById("check4").checked==true)
{
x4= parseInt(document.getElementById("food4").value);
a4=document.getElementById("check4").value;
 y+=x4;

  }
  
 else   if(x4>0)
  {
	  if(document.getElementById("check4").checked==false)
{
x4= parseInt(document.getElementById("food4").value);
	a4=document.getElementById("check4").value;
	y-=x4;
	a4=null;
	x4=null;
  }
  
  }
 
  

if(document.getElementById("check5").checked==true)
{
x5= parseInt(document.getElementById("food5").value);
a5=document.getElementById("check5").value;
 y+=x5;
 
  }
  
   
 else if(x5>0)
  {
	 if(document.getElementById("check5").checked==false)
{
x5= parseInt(document.getElementById("food5").value);
	a5=document.getElementById("check5").value;
	y-=x5;
	a5=null;
		x5=null;
  } 
  }
  

if(document.getElementById("check6").checked==true)
{
x6= parseInt(document.getElementById("food6").value);
a6=document.getElementById("check6").value;
 y+=x6;
 
  }
  
  else  if(x6>0)
  {
	  if(document.getElementById("check6").checked==false)
{
x6= parseInt(document.getElementById("food6").value);
	a6=document.getElementById("check6").value;
	y-=x6;
	a6=null;
		x6=null;
  }
  
  }
 
  

if(document.getElementById("check7").checked==true)
{
x7= parseInt(document.getElementById("food7").value);
a7=document.getElementById("check7").value;
 y+=x7;
 
  }
  else if(x7>0)
  {
	  if(document.getElementById("check7").checked==false)
{
x7= parseInt(document.getElementById("food7").value);
	a7=document.getElementById("check7").value;
	y-=x7;
	a7=null;
		x7=null;
  }
  
  }
   
 
  

if(document.getElementById("check8").checked==true)
{
x8= parseInt(document.getElementById("food8").value);
	a8=document.getElementById("check8").value;
	y+=x8;
	
  }
 else  if(x8>0)
  {
	  if(document.getElementById("check8").checked==false)
{
 x8= parseInt(document.getElementById("food8").value);
	a8=document.getElementById("check8").value;
	y-=x8;
	a8=null;
	x8=null;
  }
  }
 
if(document.getElementById("check9").checked==true)
{
x9= parseInt(document.getElementById("food9").value);
	a9=document.getElementById("check9").value;
	y+=x9;
	
	
  }
 else  if(x9>0)
  {
	  if(document.getElementById("check9").checked==false)
{
	 x9= parseInt(document.getElementById("food9").value);
	a9=document.getElementById("check9").value;
	y-=x9;
	a9=null;
	x9=null;
  }
  
  }
   
 
  

if(document.getElementById("check10").checked==true)
{
x10= parseInt(document.getElementById("food10").value);
	a10=document.getElementById("check10").value;
	y+=x10;

  }
  else if(x10>0)
  {
	  if(document.getElementById("check10").checked==false)
{
 x10= parseInt(document.getElementById("food10").value);
	a10=document.getElementById("check10").value;
	y-=x10;
a10=null;
x10=null;
  }
  }
   
 
  

if(document.getElementById("check11").checked==true)
{
x11= parseInt(document.getElementById("food11").value);
	a11=document.getElementById("check11").value;
	y+=x11;

 }
 else if(x11>0)
  {
	  if(document.getElementById("check11").checked==false)
{
 x11= parseInt(document.getElementById("food11").value);
	a11=document.getElementById("check11").value;
	y-=x11;
a11=null;
x11=null;
 }
  }
  
  if(document.getElementById("check12").checked==true)
{
x12= parseInt(document.getElementById("food12").value);
	a12=document.getElementById("check12").value;
	y+=x12;

	
 }
 else if(x12>0)
  {
	  if(document.getElementById("check12").checked==false)
{
	 x12= parseInt(document.getElementById("food12").value);
	a12=document.getElementById("check12").value;
	y-=x12;
	a12=null;
	x12=null;
 } 
  }
 
if(x1>0)
{
document.getElementById("first").innerHTML = a1; 
document.getElementById("a").innerHTML = x1;
}
if(x2>0)
{
	 document.getElementById("b").innerHTML = x2;
 document.getElementById("second").innerHTML = a2;
 }
 if(x3>0) 
 {
 	document.getElementById("c").innerHTML = x3; 
 document.getElementById("third").innerHTML = a3; 
}
 if(x4>0) 
{
	 document.getElementById("d").innerHTML = x4; 
 document.getElementById("fourth").innerHTML = a4; 
}
 if(x5>0) 
 {
 	 document.getElementById("e").innerHTML = x5; 
 document.getElementById("fifth").innerHTML = a5; 
}
 if(x6>0) 
 {
 	 document.getElementById("f").innerHTML = x6; 
 document.getElementById("six").innerHTML = a6; 
}
 if(x7>0) 
 {
 	 document.getElementById("g").innerHTML = x7; 
 document.getElementById("seven").innerHTML = a7; 
}
 if(x8>0) 
 {
 	 document.getElementById("h").innerHTML = x8; 
 document.getElementById("eight").innerHTML = a8; 
}
 if(x9>0) 
 {
 	 document.getElementById("i").innerHTML = x9; 
 document.getElementById("nine").innerHTML = a9; 
}
 if(x10>0) 
 {
 	 document.getElementById("j").innerHTML = x10; 
 document.getElementById("ten").innerHTML = a10; 
}
 if(x11>0) 
 {
 	 document.getElementById("k").innerHTML = x11; 
 document.getElementById("eleven").innerHTML = a11; 
}
 if(x12>0) 
 {

 document.getElementById("l").innerHTML = x12;
 document.getElementById("twlewe").innerHTML = a12; 


}
if(y>0)
{
	 document.getElementById("m").innerHTML = y;
}
}


