let url = "http://192.168.43.249/web_administrativa_backend/release/v1.0.0/?action=searchUserById&userId=";
let targetUrl = "http://192.168.43.249/web_administrativa_backend/release/v1.0.0/";

let data = [];

window.onload = () => {
	reloadQuery(url);
	let enter = document.getElementById("search-data");
	enter.addEventListener("click", (e) => {
		let query = document.getElementById("user-category");
		let parameter = document.getElementById("parametro");
		console.log(parameter.value + "PARAMETER");
		let action = document.querySelectorAll(".optionUser");
		e.preventDefault();
		if (parameter.value != null && parameter.value != "") {
			if (query.value != null && query.value != "") {
				data.push(parameter.value);
				console.log(data);
				triggerData(query.value, data);
			} else {
				alert("Ingrese una acción a realizar");
			}
		} else {
			alert("Los parámetros están vacíos");
		}
	});
};

function getQueryVariable(variable) {
	var query = window.location.search.substring(1);
	var vars = query.split("&");
	for (var i = 0; i < vars.length; i++) {
		var pair = vars[i].split("=");
		if (pair[0] == variable) {
			return pair[1];
		}
	}
	return false;
}

function triggerData(action, data) {
	switch (action) {
		case "getRankUser":
			getRankUser(data);
			break;
		case "passRecovery":
			passRecovery(data);
			break;
		case "insertUser":
			insertUser(data);
			break;
		case "restrictNotice":
			restrictNotice(data);
			break;
		case "changeTypeUser":
			changeTypeUser(data);
			break;
		case "changePassword":
			changePassword(data);
			break;
		case "getAgeUser":
			getAgeUser(data);
			break;
		case "searchUserByStatus":
			searchUserByStatus(data);
			break;
		case "searchUserByDocument":
			searchUserByDocument(data);
			break;
		case "searchUserByPhone":
			searchUserByPhone(data);
			break;
		case "searchUserByName":
			searchUserByName(data);
			break;
		case "searchUserById":
			searchUserById(data);
			break;
		case "searchUserByEmail":
			searchUserByEmail(data);
			break;
		case "insertReaction":
			insertReaction(data);
			break;
		case "createComment":
			createComment(data);
			break;
		case "deleteReaction":
			deleteReaction(data);
			break;
		case "editComment":
			editComment(data);
			break;
		case "searchCommentByAuthor":
			searchCommentByAuthor(data);
			break;
		case "deleteComment":
			deleteComment(data);
			break;
		case "searchCommentByNotice":
			searchCommentByNotice(data);
			break;
		case "createNotice":
			createNotice(data);
			break;
		case "editNotice":
			editNotice(data);
			break;
		case "editNoticeStatus":
			editNoticeStatus(data);
			break;
		case "deleteNotice":
			deleteNotice(data);
			break;
		case "generalNoticeSearch":
			generalNoticeSearch(data);
			break;
		case "searchActiveNotification":
			searchActiveNotification(data);
			break;
		case "searchNotification":
			searchNotification(data);
			break;
		case "textNoticeSearch":
			textNoticeSearch(data);
			break;
		default:
			alert("No existe esa acción" + action);
			break;
	}
}
function searchUserById(data) {
	let newUrl = targetUrl + "?action=searchUserById&userId=" + data[0];
	data.pop();
	reloadQuery(newUrl);
}

function searchUserByName(data) {
	let newUrl = targetUrl + "?action=searchUserByName&userName=" + data[0];
	data.pop();
	reloadQuery(newUrl);
}
function searchUserByPhone(data) {
	let newUrl = targetUrl + "?action=searchUserByPhone&userPhone=" + data[0];
	data.pop();
	reloadQuery(newUrl);
}

function searchUserByEmail(data) {
	let newUrl = targetUrl + "?action=searchUserByEmail&userEmail=" + data[0];
	data.pop();
	reloadQuery(newUrl);
}

function searchUserByStatus(data) {
	let newUrl = targetUrl + "?action=searchUserByStatus&userStatus=" + data[0];
	data.pop();
	reloadQuery(newUrl);
}

function searchUserByDocument(data) {
	let newUrl = targetUrl + "?action=searchUserByDocument&searchDocumentUser=" + data[0];
	data.pop();
	reloadQuery(newUrl);
}

//😎
function commentData(action, data) {}

function reloadQuery(reloadUrl) {
	console.log(reloadUrl);
	fetch(reloadUrl)
		.then((response) => response.json())
		.then((data) => mostrarData(data))
		.catch((error) => console.log(error));
}

const mostrarData = (data) => {
	console.log(data);
	let body = "";
	body += `<thead>
                    <tr>
                        <th class="tg-0pky">ID</th>
                        <th class="tg-0pky">Nombre</th>
                        <th class="tg-0pky">Email</th>
                        <th class="tg-0pky">Telefono</th>
                        <th class="tg-0pky">Tipo de Documento</th>
                        <th class="tg-0pky">Documento</th>
                        <th class="tg-0pky">Nacimiento</th>
                        <th class="tg-0pky">Estado</th>
                    </tr>
                </thead>`;
	body += `<tbody>`;
	for (let i = 0; i < data.length; i++) {
		body += `<tr><td class="tg-0pky">${data[i].ID}</td><td class="tg-0pky">${data[i].Nombre}</td><td class="tg-0pky">${data[i].Email}</td>
            <td class="tg-0pky">${data[i].Telefono}</td><td class="tg-0pky">${data[i]["Tipo de Documento"]}</td><td class="tg-0pky">${data[i].Documento}</td>
            <td class="tg-0pky">${data[i].Nacimiento}</td>
			<td class="tg-0pky">${data[i].Estado}</td><td class="tg-0pky"><i onclick="changePass('${data[i].Email}')" class="fas fa-marker table-icon-modify"></i></td>
			<td class="tg-0pky"><i class="fas fa-eraser table-icon-delete"></i></td>
			<td class="tg-0pky"><i onclick="changePass('${data[i].Email}')"class="far fa-id-card"></i></td></tr>`;
	}
	body += `</tbody>`;
	document.getElementById("data").innerHTML = body;
};

function changePass(email){
	//AGREGAR MODAL PARA INPUTS
	let oldPass = prompt("Ingrese su anterior contraseña: ");
	let newPass = prompt("Ingrese su nueva contraseña: ");
	let RePass = prompt("Repitala: ");
	let newUrl = targetUrl + "?action=changePassword&email="+ (email) +"&password="+(oldPass)+"&confirmPassword="+(newPass)+"&newConfirmPassword="+(RePass);            
	reloadUpdates(newUrl);
}

function reloadUpdates(reloadUrl) {

	console.log(reloadUrl);
	fetch(reloadUrl)
		.then((response) => response.json())
		.then((data) => modalData(data))
		.catch((error) => console.log(error));
}
function modalData(data){
	//AGREGAR MODAL PARA MENSAJES DE RTA
	alert(data[0].Message);
}