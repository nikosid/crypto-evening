//Popup form
	document.getElementById('intro_btn0').onclick = function() {
		document.getElementById('main2').classList.add('pop-open');
	}
	document.getElementById('intro_btn').onclick = function() {
		document.getElementById('main').classList.add('pop-open');
		var $elem = document.querySelector('#bl3-ttl-1');
		var text = $elem.textContent;
		document.getElementById('find').value = text
	}
	document.getElementById('intro_btn2').onclick = function() {
		document.getElementById('main').classList.add('pop-open');
		var $elem = document.querySelector('#bl3-ttl-2');
		var text = $elem.textContent;
		document.getElementById('find').value = text
	}
	document.getElementById('intro_btn3').onclick = function() {
		document.getElementById('main').classList.add('pop-open');
		var $elem = document.querySelector('#bl3-ttl-3');
		var text = $elem.textContent;
		document.getElementById('find').value = text
	}
	document.getElementById('intro_btn4').onclick = function() {
		document.getElementById('main').classList.add('pop-open');
		var $elem = document.querySelector('#bl3-ttl-4');
		var text = $elem.textContent;
		document.getElementById('find').value = text
	}
	document.getElementById('pop_close').onclick = function() {
		document.getElementById('main').classList.remove('pop-open');
	}
	document.getElementById('pop_close3').onclick = function() {
		document.getElementById('main2').classList.remove('pop-open');
	}
	document.getElementById('pop_close2').onclick = function() {
		document.getElementById('main').classList.remove('pop-result');
		document.getElementById('main').classList.remove('pop-open');
	}
	document.getElementById('pop_close4').onclick = function() {
		document.getElementById('main2').classList.remove('pop-result');
		document.getElementById('main2').classList.remove('pop-open');
	}



//Validate form
function validate(){
   document.getElementById('main').classList.add('pop-result');
   document.getElementById('main2').classList.add('pop-result');

    return true;
}
