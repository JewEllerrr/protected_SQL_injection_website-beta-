function openEditing(surname, name, patronymic, room_number, check_in_date, check_out_date, phone, id) {

    document.getElementById('inputRoomerSurame').value = surname;
    document.getElementById('inputRoomerName').value = name;
    document.getElementById('inputRoomerPatronymic').value = patronymic;
    document.getElementById('inputRoomerRoom_number').value = room_number;
    document.getElementById('inputRoomerCheck_in_date').value = check_in_date;
    document.getElementById('inputRoomerCheck_out_date').value = check_out_date;
    document.getElementById('inputRoomerPhone').value = phone;
    document.getElementById('inputRoomerID').value = id;

    document.getElementById("Editing").style.display = "flex";
}

function newDropdown() {
    document.location.href = '/www/index.php?controller=Roomer&action=get&dropdownParam=' + document.getElementById("mySelect").value;
}

function checkDate() {
    var check_in_date = document.getElementById('newRoomerCheck_in_date').value;
    var check_out_date = document.getElementById('newRoomerCheck_out_date').value;

    if (check_in_date > check_out_date) {
        alert("Wrong check out date!");
        return false;
    } else {
        document.forms["newRoomerForm"].submit();
    }

}

function openPopUp(e) {
    document.getElementById(e).style.display = "flex";
}

function closePopUp(e) {
    document.getElementById(e).style.display = "none";
}

function deleteFoo(id) {
    if (confirm("Вы подтверждаете удаление?")) {
        window.location.href = "/www/index.php?controller=Roomer&action=get" + id;
    } else {
        alert("Ну нет, так нет... чо нажимать то");
    }

}