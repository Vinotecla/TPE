<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <div class="contenido">
        <div>
            <h2>Nuestros vinos</h2>
            <p>Bienvenidos a nuestra tienda. Estamos orgullosos de ofrecerle una amplia selección de las mejores bebidas</p>
        </div>
        <div class="contenedorbebidas">
            <table>
                <thead>
                    <tr>
                        <th id="filtro-variedad">
                            VARIEDAD
                        </th>
                        <th>
                            MARCA
                        </th>
                        <th>
                            CONTENIDO
                        </th>
                        <th>
                            PRECIO
                        </th>
                        <th>
                            CANTIDAD
                        </th>
                        <th>
                            BORRAR

                        </th>
                        
                        <th>
                            EDITAR
                        </th>
                    <tr>
                </thead>
                <tbody id="pedido-ingresado">
                </tbody >
            </table>
            <br>
        </div>
        <form action="add" method="post">
            <div class="conteiner">
                <div>
                    <!-- <input type="text" placeholder="Ingrese Variedad" id="variedad"> -->
                    <select id="variedad">
                        <option value="Blanco Dulce">Blanco Dulce</option>
                        <option value="Malbec">Malbec</option>
                        <option value="Orgánico">Orgánico</option>
                        <option value="Rosado">Rosado</option>
                    </select>
                </div>
                <div>
                    <input type="text" placeholder="Ingrese Marca" id="marca">
                </div>
                <div>
                    <input type="number" placeholder="Ingrese Contenido" id="contenido">
                </div>
                <div>
                    <input type="number" name="" placeholder="Ingrese Precio" id="precio">
                </div>
                <div>
                    <input type="text" placeholder="Ingrese Cantidad" id="cantidad">
                </div>
            </div>
            <div class="conteiner">
                <div>
                    <button type="" id="btn-agregarpedido">AGREGAR</button>
                    <a type="button" href="add"></a>
                </div>
                <div>
                    <button type="button" id="btn_x3">X3</button>
                </div>
            </div>
        </form>
    </div>
    <script src="js/main.js"></script>
</body>
</html>