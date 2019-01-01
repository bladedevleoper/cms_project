let tag = document.querySelector('.tag');
var storage = window.localStorage;

if(storage.logged == 'true'){
    tag.setAttribute('hidden','');

} else {
    setInterval(() => {
    
        tag.style.display = 'none';
        storage.setItem('logged', true);
    
    }, 3000);
}


function clearStorage(){
    localStorage.clear();
}
