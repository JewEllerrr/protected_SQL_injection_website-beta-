<?php


include_once '../models/RoomerModel.php';



// if ($_SESSION['deleteRoomerID']){
//     deleteRoomer($_SESSION['deleteRoomerID']);
// }


function getAction($smarty)
{
    if (!isset($_GET['page']) && $_SESSION['page'] == NULL) {
        $_SESSION['page'] = 1;
    } elseif (isset($_GET['page'])){
        $_SESSION['page'] = abs(intval($_GET['page']));
    } 

    if (!isset($_GET['order']) && $_SESSION['order'] == NULL) {
        $_SESSION['order'] = "check_in_date";
    } elseif (isset($_GET['order']) && is_string($_GET['order'])) {
        $_SESSION['order'] = preg_replace("(/^[0-9.\- ]+/)", '', $_GET['order']);;
    } 

    if (!isset($_GET['sort']) && $_SESSION['sort'] == NULL) {
        $_SESSION['sort'] = "ASC";
    } elseif (isset($_GET['sort']) && $_GET['sort'] == "ASC") {
        $_SESSION['sort'] = "DESC";
    } elseif (isset($_GET['sort']) && $_GET['sort'] == "DESC") {
        $_SESSION['sort'] = "ASC";
    }

    if (!isset($_POST['dropdownParam']) && $_SESSION['limit'] == NULL) {
        $_SESSION['limit'] = 5;
    } elseif (isset($_POST['dropdownParam'])) {
        $_SESSION['limit'] = abs(intval($_POST['dropdownParam']));
        $_SESSION['page'] = 1;
    }

    $rsUsers = getLastRoomers($_SESSION['order'], $_SESSION['sort'], $_SESSION['limit'], $_SESSION['page']);
    $smarty->assign('pageTitle', 'page for stuff');

    $smarty->assign('rsUsers', $rsUsers);
    $smarty->assign('_SESSION', $_SESSION);
    $smarty->assign('numDropdown');

    loadTemplate($smarty, 'allRoomersPage');
    loadTemplate($smarty, 'footer');
}

function getPersonAction($smarty)
{
    if (isset($_GET['id'])) {
        $result = getRoomerInfo($_GET['id']);
        $smarty->assign('pageTitle', 'info page roomer');
    
        $smarty->assign('info', $result);
        $smarty->assign('_SESSION', $_SESSION);
    
        loadTemplate($smarty, 'RoomerInfoPage');
        loadTemplate($smarty, 'footer');
    }
    else {
        $error['error'] = "ERROR";
        $smarty->assign('ERROR', $error);
        getAction($smarty);
    }
}


function getDeleteAction($smarty)
{
    if (isset($_GET['id'])) {
        deleteRoomer($_GET['id']);
        getAction($smarty);
    }
    else {
        $error['error'] = "ERROR";
        $smarty->assign('ERROR', $error);
        getAction($smarty);
    }
}

function editRoomerByStaffAction($smarty)
{
    if(isset($_POST['id'], $_POST['surname'], $_POST['name'], $_POST['patronymic'], $_POST['room_number'], $_POST['check_in_date'], $_POST['check_out_date'], $_POST['phone'])){
        $error = editRoomerByStaff($_POST['id'], $_POST['surname'], $_POST['name'], $_POST['patronymic'], $_POST['room_number'], $_POST['check_in_date'], $_POST['check_out_date'], $_POST['phone']);
        if($error){
            $smarty->assign('ERROR', $error);
        }
        getAction($smarty);
    }
    
}


function addNewRoomerByStaffAction($smarty)
{
    if (isset($_POST['surname'], $_POST['name'], $_POST['patronymic'], $_POST['room_number'], $_POST['check_in_date'], $_POST['check_out_date'], $_POST['login'], $_POST['email'], $_POST['phone'])){
        $error = registerNewRoomerByStaff($_POST['surname'], $_POST['name'], $_POST['patronymic'], $_POST['room_number'], $_POST['check_in_date'], $_POST['check_out_date'], $_POST['login'], $_POST['email'], $_POST['phone']);
        if($error){
            $smarty->assign('ERROR', $error);
        }
        getAction($smarty);
    }
    
}