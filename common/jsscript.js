var request = false;

// Request senden
function setRequest(tag) {
  var avail=document.getElementById(tag).className;
  avail=avail.replace("ext","");  
  var url="set.php?set="+tag+"&avail="+avail;
  // Request erzeugen
  if (window.XMLHttpRequest) {
    request = new XMLHttpRequest(); // Mozilla, Safari, Opera
  } 
  // überprüfen, ob Request erzeugt wurde
  if (!request) {
    alert("Kann keine XMLHTTP-Instanz erzeugen");
    return false;
  } else {
    request.open('post', url, false);
    request.send(null);
    var result = request.responseText;
    if (result.match("readonly"))
    {
      document.getElementById("txtbody").className = "readonly";
      alert("Filesystem ist derzeit readonly gemountet. Bitte später nochmal versuchen");
    } else {
      var output = result.split(/:/g);
      // den Inhalt des Requests in das <div> schreiben
      txttag = "txt" + tag;
      document.getElementById(txttag).innerHTML = output[1]
      document.getElementById(tag).className = output[0];
    }
  }
}

function setRequestDDDJ(pre,id) {
  var statid = "stat" + pre + id;
  var status = document.getElementById(statid).value;
  var url="/media/set.php?mode=dj&pre="+pre+"&set="+id+"&status="+status;
  // Request erzeugen
  if (window.XMLHttpRequest) {
    request = new XMLHttpRequest(); // Mozilla, Safari, Opera
  }
  // überprüfen, ob Request erzeugt wurde
  if (!request) {
    alert("Kann keine XMLHTTP-Instanz erzeugen");
    return false;
  } else {
    request.open('post', url, false);
    request.send(null);
    var result = request.responseText;
    if (result.match("readonly"))
    {
      document.getElementById("txtbody").className = "readonly";
      alert("Filesystem ist derzeit readonly gemountet. Bitte später nochmal versuchen");
    } else {
      var output = result.split(/:/g);
      // den Inhalt des Requests in das <div> schreiben
      txttag = "txt" + id;
      imgtag = pre + id;
      document.getElementById(txttag).innerHTML = output[1]
      document.getElementById(imgtag).className = output[0];
    }
  }
}

function setRequestDD(tag,mode) {
  var statid = "stat" + tag;
  var status = document.getElementById(statid).value;
  var url="/media/set.php?mode="+mode+"&set="+tag+"&status="+status;
  // Request erzeugen
  if (window.XMLHttpRequest) {
    request = new XMLHttpRequest(); // Mozilla, Safari, Opera
  }
  // überprüfen, ob Request erzeugt wurde
  if (!request) {
    alert("Kann keine XMLHTTP-Instanz erzeugen");
    return false;
  } else {
    request.open('post', url, false);
    request.send(null);
    var result = request.responseText;
    if (result.match("readonly"))
    {
      document.getElementById("txtbody").className = "readonly";
      alert("Filesystem ist derzeit readonly gemountet. Bitte später nochmal versuchen");
    } else {
      var output = result.split(/:/g);
      // den Inhalt des Requests in das <div> schreiben
      txttag = "txt" + tag;
      document.getElementById(txttag).innerHTML = output[1]
      document.getElementById(tag).className = output[0];
    }
  }
}
