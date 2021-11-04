'use strict'
const API_URL = "proyects/WEB2/TPE/api/comentarios";
let id_vino = parseInt(document.getElementById('comments').value);
console.log(id_vino);
let formComment = document.querySelector("#form-comment");
if(formComment){
    formComment.addEventListener('submit', sendComment);
}
function sendComment(e){
    e.preventDefault();

    let data = {
        comentario : document.getElementById('comentario').value,
        puntaje : document.getElementById('puntaje').value,
        id_vino : document.getElementById('id_vino').value
    }
    fetch('api/comentarios', {
        method: 'POST',
        headers: {'Content-Type' : 'application/json'},
        body: JSON.stringify(data)
    })
    .then(response =>{
        getComments();
    })
    .catch(error => console.log(error));

   
}

async function getComments(id_vino){
    console.log(id_vino)
    try{
        let response = await fetch(`api/comentarios/${id_vino}`);
        let comentarios = await response.json();
        
        renderUser(comentarios);
        renderAdmin(comentarios);

    }catch(e){
        console.log(e);
    }
}

function renderUser(comentarios){
    let listado = document.getElementById('comments-view');
    if(listado){
        listado.innerHTML = '';
        listado.innerHTML =`<thead>
                                <tr>
                                    <th>Comentario</th>
                                    <th>Puntaje</th>
                            </thead>`;
        for (let comentario of comentarios){
            let html = `<tr>
                            <th>${comentario.comentario}</th>
                            <th>${comentario.puntaje}</th>
                        </tr>`;
            listado.innerHTML += html;
        }
    }
}

function renderAdmin(comentarios){
    let listado = document.getElementById('comments-admin');
    if(listado){
        listado.innerHTML = '';
        listado.innerHTML =`<thead>
                                <tr>
                                    <th>Comentario</th>
                                    <th>Puntaje</th>
                                    <th></th>
                            </thead>`;
        for (let comentario of comentarios){
            let html = `<tr>
                            <th>${comentario.comentario}</th>
                            <th>${comentario.puntaje}</th>
                            <th><button type="button" class="btn-delete" value='${comentario.id_comentario}'>BORRAR</button></th>
                        </tr>`;
            listado.innerHTML += html;

        }
    }
    addBtnDelete();
}


function addBtnDelete(){
    let btn_delete = document.querySelectorAll('.btn-delete');
    let id_vino = parseInt(document.getElementById('comments').value);
    btn_delete.forEach(element =>{element.addEventListener('click', deleteComment)})
}

function deleteComment(){
    let id_comment = parseInt(this.value);

    console.log(id_comment)
    fetch(`api/comentarios/${id_comment}`, {
        method: 'DELETE'
    })
    .then(response =>{
        getComments(id_vino);
    })
    .catch(error => console.log(error));
}

getComments(id_vino);

