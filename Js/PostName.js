document.getElementById('post-form').addEventListener('submit', postName);
function postName(e){
    e.preventDefault();

    console.log("Current county is: "+currentCounty);
    const name = document.getElementById('name2').value;
    const params = "name=" + name + "&county=" + currentCounty;

    const xhr = new XMLHttpRequest();
    xhr.open('POST', '../Php/response.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    xhr.onload = function(){
        console.log(this.responseText);
    }

    xhr.send(params);
}