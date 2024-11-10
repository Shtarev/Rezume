function progressLoschen(elem) {
	var res = confirm('Wollen Sie Skill "'+elem+'" löschen?');
	if(res) {
		var form = document.getElementById('skillDel');
		form[0].value = elem;
		form.submit();
	}
}

async function skilTest(elem) {
  let uri = location.protocol+'//'+window.location.hostname;
  let resp = await fetch(uri + '/src/skillCheck.php?skillCheck=' + elem.form[0].value).then((response) => response.json());
	let isZahl = elem.form[1].value * 1;
	
  if(resp != 'ok') {
    alert('Skill "' + resp + '" bereits existiert');
  }
  else if(!isZahl) {
		alert('Feld Skill Prozent soll ein Nummer mehr als 0 sein');
		elem.form[1].style = 'background-color: coral';
		setTimeout(function(){elem.form[1].style.backgroundColor='white'; elem.form[1].style.transition='2s';}, 3000);
	}
	else if(elem.form[0].value == '') {
		alert('Feld Skill Nachweis soll ein aufgefüllt sein');
		elem.form[0].style = 'background-color: coral';
		setTimeout(function(){elem.form[0].style.backgroundColor='white'; elem.form[0].style.transition='2s';}, 3000);
	}
	else {
		elem.form.submit();  
	}
}
function beispielLoschen(elem) {
	var res = confirm('Wollen Sie Beispiel löschen?');
	if(res) {
		elem.type='submit';
	}
}
function fotoChoice(elem) {
    var divFileLoad = document.getElementById('divFileLoad');
    if(divFileLoad === null) {
        var div = document.createElement('div');
        div.className = 'divFileLoad';
        div.id = 'divFileLoad';
        var input = document.createElement('input');
        input.type = 'file';
        input.id = 'ichFile';
        input.name = 'ichFile';
        div.prepend(input);
        div.insertAdjacentHTML('afterbegin', '<h3 id="divFileLoadH3">Wählen Sie Foto</h3>');
        var clos = document.createElement('div');
        clos.className = 'clos';
        clos.id = 'clos';
        clos.insertAdjacentHTML('afterbegin', 'X')
        div.prepend(clos);
        document.body.append(div);
    }
}
document.addEventListener("click", function(event) {
    var id = event.target.id;
    if(id == 'clos') {
        var elem = document.getElementById('divFileLoad');
        elem.remove();
    }
});
document.addEventListener('input', function(event) {
    var id = event.target.id;
    let value = undefined;
    
    if(event.target.nodeName == 'INPUT' && event.target.type == 'text') {
      event.target.value = event.target.value.replace(/</g, '').replace(/>/g, '');
      value = event.target.value;
    }

    if(id == 'resume') {
        datenFileIn(id, 'robotResume');
    }
     else if(id == 'ichFile') {
        datenFileIn(id, 'fotorobot');
        document.getElementById('divFileLoadH3').innerHTML = '<font color="#006600">Foto ist geladen</font>';
        var name = document.getElementById('ichFile').files[0].name;
        var extension = name.split('.').pop();
        document.getElementById('ich').src='images/uhr.gif';
        setTimeout(function(){
            var elem = document.getElementById('divFileLoad');
            elem.remove();
            document.getElementById('ich').src='images/ich.'+extension;
        }, 3000);
    }
    else if(id != '' && id != 'skillName' && id != 'skillProzent' && id != 'beispiel' && id != 'beispielFoto' && id != 'emailW' && id != 'passW') {
      datenIn(id, value, 'robotContentTitle');
    }
});
function datenIn(id, value, robot) {
    var counter = 0;
    for (var i = 0; i < id.length; i++) {
        if (id[i] === '_') counter++;
    }
    if(counter ==  2) {
        value = document.getElementById(id).innerHTML;
        id = id.substring(0, id.length - 2);
        robot = 'robotContent';
    }
    var xmlhttp = getXmlHttp();
    xmlhttp.open('POST', 'src/'+robot+'.php', true);
    xmlhttp.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xmlhttp.send("id=" + encodeURIComponent(id) + "&value=" + encodeURIComponent(value));
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4) {
        if(xmlhttp.status == 200) {  
        }  
      }  
    }  
}
function datenFileIn(id, robot) {
    var file = document.getElementById(id);
    var xmlhttp = getXmlHttp();
    form = new FormData();
    var upload_file = file.files[0];
    form.append(id, upload_file);
    xmlhttp.open('post', 'src/'+robot+'.php', true);
    xmlhttp.send(form);
    xmlhttp.onreadystatechange = function() {
      if (xmlhttp.readyState == 4) {  
        if(xmlhttp.status == 200) {
        }  
      }  
    }  
}
function getXmlHttp() {  
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
function isNumber(num) {  
    return typeof num === 'number' && !isNaN(num);  
}
function editor(elem) {
    var editor = document.getElementById('editor')
    if(editor !== null) {
        editor.remove();
        elem.insertAdjacentHTML('beforebegin', '<div id="editor" class="toolbar">\
                                                      <a href="#" class="toolbar-b fas fa-bold" title="Жирный"></a>\
                                                      <a href="#" class="toolbar-ul fas fa-list-ul" title="Маркированный список"></a>\
                                                      <select class="toolbar-size">\
                                                        <option selected="selected" disabled="disabled">Größe</option>\
                                                        <option value="1">10px</option>\
                                                        <option value="2">12px</option>\
                                                        <option value="3">14px</option>\
                                                        <option value="4">16px</option>\
                                                        <option value="5">18px</option>\
                                                        <option value="6">21px</option>\
                                                        <option value="7">26px</option>\
                                                      </select>\
                                                      <span>Text</span> <input class="toolbar-color" type="color" value="#ff0000">\
                                                      <span>Bg</span> <input class="toolbar-bg" type="color" value="#ffff00">\
                                                    </div>');
    }
    else {
            elem.insertAdjacentHTML('beforebegin', '<div id="editor" class="toolbar">\
                                                  <a href="#" class="toolbar-b fas fa-bold" title="Жирный"></a>\
                                                  <a href="#" class="toolbar-ul fas fa-list-ul" title="Маркированный список"></a>\
                                                  <select class="toolbar-size">\
                                                    <option selected="selected" disabled="disabled">Größe</option>\
                                                    <option value="1">10px</option>\
                                                    <option value="2">12px</option>\
                                                    <option value="3">14px</option>\
                                                    <option value="4">16px</option>\
                                                    <option value="5">18px</option>\
                                                    <option value="6">21px</option>\
                                                    <option value="7">26px</option>\
                                                  </select>\
                                                  <span>Text</span> <input class="toolbar-color" type="color" value="#ff0000">\
                                                  <span>Bg</span> <input class="toolbar-bg" type="color" value="#ffff00">\
                                                </div>');
    }
}

let nachtragAdd = document.createElement('script');
nachtragAdd.src ='js/nachtrag.js?' + Date.now();
document.body.append(nachtragAdd);