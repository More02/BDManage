document.getElementById('add_dogovor').style.visibility = 'hidden';
document.getElementById('add_client').style.visibility = 'hidden';
let a=document.getElementById('add_table').value;
document.getElementById('add_button').onclick=function () {
    alert(a);
    if (a=="Договор") {
        document.getElementById('add_dogovor').style.visibility = 'visible';
    }
    if (a=="Клиент") {
        document.getElementById('add_client').style.visibility = 'visible';
    }

}

