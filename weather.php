<script type="text/javascript">
function getAjax()   //Crea el objeto XMLHttpRequest
{
     var req;
	 if(window.XMLHttpRequest)
	 {
		 req = new XMLHttpRequest();
	 }
	 else
	 {
	      req = new ActiveXObject("Microsoft.XMLHTTP");
	 }
	 return req;
}

function getTemps(elem)  //Sirve para mostrar la temperatura de la ciudad seleccionada
{
	 var sel = elem.value;
	 if (elem.selectedIndex != 0)
	 {
	 setCookie('ciudad',sel,30);
	 setCookie('index',elem.selectedIndex,30);
     var req = getAjax();
	 var url = "<?php echo get_permalink(236160) ?>?sel="+sel;
	 req.onreadystatechange = function()
	 {
			if(req.readyState == 4 && req.status ==200)
			{	
				var resp = req.responseText.split("*");
				document.getElementById('weather_info').innerHTML= resp[0];
				//document.getElementById('weather_details').innerHTML= resp[1];
				elem.selectedIndex = 0;
			}
	 }
	 req.open("GET",url,true);
	 req.send();
	 }
}

function getTempsInit()  //Sirve para mostrar la temperatura de veracruz al inicio de la pagina
{
	 //alert(document.cookie);
	 var sel = getCookie('ciudad');
	 if(sel == null)
	 {
		sel = 'veracruz';
	 }
	 var index = getCookie('index');
	 if(index == null)
	 {
		document.getElementById('select01').options[0].selected = true;
	 }
	 else
	 {
		document.getElementById('select01').options[index].selected = true;
	 }
     var req = getAjax();
	 var url = "<?php echo get_permalink(236160) ?>?sel="+sel;
	 req.onreadystatechange = function()
	 {
			if(req.readyState == 4 && req.status ==200)
			{	
				var resp = req.responseText.split("*");
				document.getElementById('weather_info').innerHTML= resp[0];
				//document.getElementById('weather_details').innerHTML= resp[1];
				document.getElementById('select01').options[0].selected = true;
			}
	 }
	 req.open("GET",url,true);
	 req.send();
}

function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value+'; path=/;';
}

function getCookie(c_name)
{
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
{
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}
</script>