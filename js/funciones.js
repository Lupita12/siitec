// Esta libreria tiene las funciones que se utilizan para validar campos
// que sean numericos, alfanumericos, emails

var nav4 = window.Event ? true : false;
function soloNum(evt){
// NOTE: Backspace = 8, Enter = 13, '0' = 48, '9' = 57
var key = nav4 ? evt.which : evt.keyCode;
return (key <= 13 || (key >= 48 && key <= 57));
}

function soloLetras(e) { // 1
tecla = (document.all) ? e.keyCode : e.which;
if (tecla==8||tecla==0)
	return true;
patron =/[A-ZÑa-zñ.Á-Úá-úÄ-Üä-ü\s]/;
te = String.fromCharCode(tecla);
return patron.test(te);
} 

function esNoInv(e){
tecla = (document.all) ? e.keyCode : e.which;
if (tecla==8||tecla==0)
	return true;
patron =/[0-9-]/;
te = String.fromCharCode(tecla);
return patron.test(te);
}

function esHora(e){
tecla = (document.all) ? e.keyCode : e.which;
if (tecla==8||tecla==0)
	return true;
patron =/[0-9:]/;
te = String.fromCharCode(tecla);
return patron.test(te);
}

function esEmail(e){
tecla = (document.all) ? e.keyCode : e.which;
if (tecla==8||tecla==0) 
	return true;
patron =/[A-Za-z0-9@.-_]/;
te = String.fromCharCode(tecla);
return patron.test(te);
}

// This code was written by Tyler Akins and has been placed in the
// public domain.  It would be nice if you left this header intact.
// Base64 code from Tyler Akins -- http://rumkin.com

var keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";

function encode64(input) {
   var output = "";
   var chr1, chr2, chr3;
   var enc1, enc2, enc3, enc4;
   var i = 0;

   do {
      chr1 = input.charCodeAt(i++);
      chr2 = input.charCodeAt(i++);
      chr3 = input.charCodeAt(i++);

      enc1 = chr1 >> 2;
      enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
      enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
      enc4 = chr3 & 63;

      if (isNaN(chr2)) {
         enc3 = enc4 = 64;
      } else if (isNaN(chr3)) {
         enc4 = 64;
      }

      output = output + keyStr.charAt(enc1) + keyStr.charAt(enc2) + 
         keyStr.charAt(enc3) + keyStr.charAt(enc4);
   } while (i < input.length);
   
   return output;
}

function decode64(input) {
   var output = "";
   var chr1, chr2, chr3;
   var enc1, enc2, enc3, enc4;
   var i = 0;

   // remove all characters that are not A-Z, a-z, 0-9, +, /, or =
   input = input.replace(/[^A-Za-z0-9\+\/\=]/g, "");

   do {
      enc1 = keyStr.indexOf(input.charAt(i++));
      enc2 = keyStr.indexOf(input.charAt(i++));
      enc3 = keyStr.indexOf(input.charAt(i++));
      enc4 = keyStr.indexOf(input.charAt(i++));

      chr1 = (enc1 << 2) | (enc2 >> 4);
      chr2 = ((enc2 & 15) << 4) | (enc3 >> 2);
      chr3 = ((enc3 & 3) << 6) | enc4;

      output = output + String.fromCharCode(chr1);

      if (enc3 != 64) {
         output = output + String.fromCharCode(chr2);
      }
      if (enc4 != 64) {
         output = output + String.fromCharCode(chr3);
      }
   } while (i < input.length);

   return output;
}