'use strict'

const API_URL = "api/comentarios";

let id_vino = parseInt(document.getElementById('comments').value);
let formComment = document.querySelector("#form-comment");

if(formComment){
    formComment.addEventListener('submit', sendComment);
}

let btn_scoreFilter = document.querySelector('#form-filtro');

if(btn_scoreFilter){
    btn_scoreFilter.addEventListener('submit', scoreFilter);
}

let btn_commentsOrder = document.querySelector('#form-orden');

if(btn_commentsOrder){
    btn_commentsOrder.addEventListener('submit', orderComments);
}

async function orderComments(e){
    e.preventDefault();
    console.log('ORDENANDO');
    let orden = document.querySelector('#orden').value;
    try{
        let response = await fetch(`${API_URL}/orden/${id_vino}/${orden}`);
        let comentarios = await response.json();
        console.log(comentarios);
        renderUser(comentarios);

    }catch(e){
        console.log(e);
    }
}

async function scoreFilter(e){
    e.preventDefault();
    console.log('FILTRANDO');
    let scoreFilter = document.querySelector('#puntaje-filtro').value;
    console.log(scoreFilter);
    try{
        let response = await fetch(`${API_URL}/puntaje/${id_vino}/${scoreFilter}`);
        let comentarios = await response.json();
        console.log(comentarios);
        renderUser(comentarios);

    }catch(e){
        console.log(e);
    }
}

function sendComment(e){
    e.preventDefault();
    console.log('ENVIANDO');
    let data = {
        comentario : document.getElementById('comentario').value,
        puntaje : document.getElementById('puntaje').value,
        id_vino : document.getElementById('id_vino').value
    }
    fetch(`${API_URL}`, {
        method: 'POST',
        headers: {'Content-Type' : 'application/json'},
        body: JSON.stringify(data)
    })
    .then(response =>{
        getComments(id_vino);
    })
    .catch(error => console.log(error));
}

async function getComments(id_vino){
    console.log('Busando comentarios de vino con id = '+id_vino);
    try{
        let response = await fetch(`${API_URL}/${id_vino}`);
        let comentarios = await response.json();
        
        renderUser(comentarios);
        renderAdmin(comentarios);

    }catch(e){
        console.log(e);
    }
}

function renderUser(comentarios){
    console.log('Mostrando comentarios de vino con id = '+id_vino);
    console.log(comentarios);
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

// function AddviewComment(){
//     let btn_view_comemnt = document.querySelectorAll('.btn-comment');
//     btn_view_comemnt.forEach(element =>{element.addEventListener('click', getComment)})
// }

// async function getComment(){
//     console.log(this.value);
//     try{
//         let response = await fetch(`api/comentario/${this.value}`);
//         let comentarios = await response.json();
//         viewComment(comentarios);

//     }catch(e){
//         console.log(e);
//     }
// }

// function viewComment(comentario){
//     console.log(comentario);
//     let comentView = document.querySelector('#contenedor-comentario');
//     comentView.innerHTML = `<thead>
//                                 <tr>
//                                 <th>COMENTARIO</th>
//                                 <th>PUNTAJE</th>
//                                 </tr>
//                             </thead>
//                                 <tr>
//                                 <th>${comentario[0].comentario}</th>                       
//                                 <th>${comentario[0].puntaje}</th>
//                             </tr>`
// }

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
    btn_delete.forEach(element =>{element.addEventListener('click', deleteComment)})
}

function deleteComment(){
    let id_comment = parseInt(this.value);

    console.log('BORRANDO COMENTARIO ID='+id_comment);
    fetch(`api/comentarios/${id_comment}`, {
        method: 'DELETE'
    })
    .then(response =>{
        getComments(id_vino);
    })
    .catch(error => console.log(error));
}

getComments(id_vino);
