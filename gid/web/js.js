function openmenu(name){
    var menu = document.getElementsByClassName(name)[0];

    if(!menu.style.display){
        menu.style.display = 'block';
    } else if(menu.style.display === 'none'){
        menu.style.display = 'block';
    } else if(menu.style.display !== 'none'){
        menu.style.display = 'none';
    }
}