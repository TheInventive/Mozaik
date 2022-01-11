function getName(e){
    document.getElementById('choice').innerText = e.target.innerText;
    document.getElementById('megye').innerText = e.target.innerText;
    e.preventDefault();

    var xhr = new XMLHttpRequest();
    console.log(e.target.id);
    xhr.open('GET', '../Php/response.php?name='+e.target.id, true);

    xhr.onload = function(){
        console.log(this.responseText);
        let elements = this.responseText.slice(0, -1).split(';');
        let output = '';

        for (const i in elements) {
            output += '<ul>' +
                '<li data-editable>'+elements[i]+'</li>' +
                '</ul>';
        }
        document.getElementById("result").innerHTML = output;
    }

    xhr.send();
}