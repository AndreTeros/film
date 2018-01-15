function addFields() {
	var t, tr, cell, c,
		name1Input, name2Input;

	t = document.getElementById('addfilm');
	tr = document.getElementById('actorrow');

	c = t.insertRow(t.rows.length - 2);
	cell = c.insertCell();

	// cell = t.rows[t.rows.length-1].cells[0];

	name1Input = document.createElement('input');
	name1Input.setAttribute("type","text");
	name1Input.setAttribute("name","NAME[]");
	name1Input.classList.add("half");
	cell.appendChild(name1Input);
	name2Input = document.createElement('input');
	name2Input.setAttribute("type","text");
	name2Input.setAttribute("name","SURNAME[]");
	name2Input.classList.add("half");
	cell.appendChild(name2Input);

	tr.querySelector('th').setAttribute("rowspan",Number(tr.querySelector('th').getAttribute("rowspan"))+1);
}

var addFieldsButton = document.getElementById('addfields');
addFieldsButton.addEventListener('click',function(){addFields()});
