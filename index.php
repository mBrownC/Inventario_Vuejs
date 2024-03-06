<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/1ac22e0cde.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="plugins/sweetalert/sweetalert2.min.css">
    <link rel="stylesheet" href="main.css">
    <title>Inventario</title>
</head>

<body>
    <header>
        <h1 class="text-center test-dark"><span class="badge bg-success">Inventario</span></h1>
    </header>
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col">
                    <button @click="btnAlta" class="btn btn-success" title="Nuevo"><i class="fas fa-plus-circle fa-2m"></i></button>
                </div>
                <div class="col tex-right">
                    <h5> Stock Total: <span class="badge bg-success">{{totalStock}}</span></h5>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-12">
                    <table class="table  table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>SKU</th>
                                <th>STOCK</th>
                                <th>VALOR/UNIDAD</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(producto,indice) of productos">
                                <td>{{producto.id}}</td>
                                <td>{{producto.nombre}}</td>
                                <td>{{producto.sku}}</td>
                                <td>
                                    <div class="col-md-8">
                                        <input type="number" v-model.number="producto.stock" class="from-control text-right" disabled>
                                    </div>
                                </td>
                                <td>{{producto.valor}}</td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <button class="btn btn-secondary" title="Editar" @click="btnEditar(propducto.id, 
                                        producto.nombre, producto.sku, producto.valor, producto.stock)">
                                            <i class="fa-solid fa-pencil"></i>
                                        </button>
                                        <button class="btn btn-danger" title="Eliminar" @click="btnBorrar(propducto.id)">
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
    <script src="jquery/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/@popperjs/core@2"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/vue@3/dist/vue.global.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="./plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="main.js"></script>
</body>

</html>