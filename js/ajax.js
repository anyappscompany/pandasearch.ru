
function getXmlHttp(){
  var xmlhttp;
  try {
    xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
  } catch (e) {
    try {
      xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    } catch (E) {
      xmlhttp = false;
    }
  }
  if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
    xmlhttp = new XMLHttpRequest();
  }
  return xmlhttp;
}

function base64_decode( data ) {

    var b64 = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
    var o1, o2, o3, h1, h2, h3, h4, bits, i=0, enc='';

    do {
        h1 = b64.indexOf(data.charAt(i++));
        h2 = b64.indexOf(data.charAt(i++));
        h3 = b64.indexOf(data.charAt(i++));
        h4 = b64.indexOf(data.charAt(i++));

        bits = h1<<18 | h2<<12 | h3<<6 | h4;

        o1 = bits>>16 & 0xff;
        o2 = bits>>8 & 0xff;
        o3 = bits & 0xff;

        if (h3 == 64)      enc += String.fromCharCode(o1);
        else if (h4 == 64) enc += String.fromCharCode(o1, o2);
        else               enc += String.fromCharCode(o1, o2, o3);
    } while (i < data.length);

    return unescape(enc);
}


function startSearch(action) {
	var req = getXmlHttp()
	var statusElem = document.getElementById('resultSearchMusic');
	req.onreadystatechange = function() {
		if (req.readyState == 4) {
			statusElem.innerHTML = req.statusText;
			if(req.status == 200) {
				statusElem.innerHTML = req.responseText;
                if(req.responseText!='No Results Found!'){
                window.location.href = "http://"+document.domain+"/"+req.responseText+".html";
                }
                //var contact = JSON.parse(req.responseText);
                //alert( contact.response[2].aid );
                //var user = '{ "name": "Вася", "age": 35, "isAdmin": false, "friends": [0,1,2,3] }';
                //statusElem.innerHTML = req.responseText;
                //alert( req.responseText );
                /*var vkJson = req.responseText;
                var audio = document.getElementById('audio');
                var source = document.getElementById('mp3Source');   vkJson="llllll";
                source.src='http://cs1-39v4.vk-cdn.net/p14/44661a3c022644.mp3?extra=qj1NyuElN33cgIuHuIBa_E_UMMLOzSyh5LlcUKPoMwIsy_1bfbYbGirVUerZns7M7HiCbLcyPn0Pl-K4xMlZaptbGSP2x_jP';
                audio.load();
                audio.play();*/
			}
		}
	}
    if(action==0){
	req.open('GET', '/search.php?musicmp3='+encodeURIComponent(document.getElementById("musicmp3").value), true);
    }else{
      req.open('GET', '/search.php?musicmp3='+encodeURIComponent(action), true);
    }
	req.send(null);
	statusElem.innerHTML = 'Ожидается ответа сервера...';
}