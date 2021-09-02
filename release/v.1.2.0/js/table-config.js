const modal = document.getElementById("modal");

function formUser(id) {
	return (
		'<form class="modal-form" method="post" onsubmit="return editUser(' +
		id +
		')">' +
		'<div class="modal-content">' +
		"<h1>Añadir usuario</h1>" +
		'<div class="form-sections">' +
		'<div class="inputs-column">' +
		'<div class="input-container">' +
		'<input type="text" name="name" id="nombreModal" placeholder="Nombre" />' +
		"</div>" +
		'<div class="input-container">' +
		'<input type="email" name="email" id="emailModal" placeholder="Correo Electrónico" />' +
		"</div>" +
		'<div class="input-container">' +
		'<input type="tel" name="phone-number" id="numeroModal" placeholder="Número Telefónico" />' +
		"</div>" +
		'<div class="input-container">' +
		'<input type="type" name="type-document" id="tipoDocModal" placeholder="Tipo de Documento" />' +
		"</div>" +
		'<div class="input-container">' +
		'<input type="text" name="user-document" id="documentoModal" placeholder="Documento" />' +
		"</div>" +
		"</div>" +
		'<div class="inputs-column">' +
		'<div class="input-container">' +
		'<input type="number" name="type-user" id="tipoUsuarioModal" placeholder="Tipo de Usuario" />' +
		"</div>" +
		'<div class="input-container">' +
		'<input type="date" name="fecha-nacimiento" id="fechaNacimientoModal" placeholder="Fecha de Nacimiento" />' +
		"</div>" +
		'<div class="input-container">' +
		'<input type="password" name="password" id="passwordModal" placeholder="Contraseña" />' +
		"</div>" +
		'<div class="input-container">' +
		'<input type="password" name="password" id="confirmarPasswordModal" placeholder="Confirmar Contraseña" />' +
		"</div>" +
		"</div>" +
		"</div>" +
		"</div>" +
		'<button type="submit">Enviar</button>' +
		"</form>"
	);
}

function activeModal(id) {
	let formType = location.pathname.split("/");
	formType = formType[formType.length - 1].replace("-table.html", "");

	switch (formType) {
		case "users":
			modal.innerHTML = formUser(id);
			break;
		case "comments":
			console.log(formType);
			break;
		case "notices":
			console.log(formType);
			break;
	}

	modal.classList.toggle("modal-container-active");
	if (id === null) {
		console.log("hola");
	} else {
		console.log("adios");
	}
}
