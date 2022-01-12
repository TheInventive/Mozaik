let currentCounty = null;

function getName(e){
    document.getElementById('choice').innerText = e.target.innerText;
    document.getElementById('megye').innerText = e.target.innerText;
    e.preventDefault();

    const xhr = new XMLHttpRequest();
    console.log(e.target.id);
    xhr.open('GET', '../Php/response.php?name='+e.target.id, true);
    currentCounty = e.target.id;
    xhr.onload = function(){
        console.log(this.responseText);
        let elements = this.responseText.slice(0, -1).split(';');
        let output = '';

        for (const i in elements) {
            output += '<ul class="flex-container">' +
                '<li class="flex-container"><li data-editable>'+elements[i]+'</li><template><button onclick="">Tötlés</button>' +
                '<button>Módosítás</button>' +
                '<button>Mégsem</button></template>' +
                '</li>' +
                '</ul>';
        }
        document.getElementById("result").innerHTML = output;
    }
    eval("var i = 0;");

    xhr.send();
}