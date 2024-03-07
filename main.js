const url="./bbdd/crud.php"

var appInventario = new Vue({
    el: "#appInventario",
    data: {
        productos: [],
        nombre: "",
        sku: "",
        Stock: "",
        valor: "",
        total: 0
    },
    methods: {
        //BOTONES

        btnNuevo: async function () {
            const { value: formValues } = await Swal.fire({
                title: "Nuevo Producto",
                html: `
                    <div class="row"><label class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-sm-6"><input id="nombre" type="text" class="form-control"></div></div>

                    <div class="row"><label class="col-sm-3 col-form-label">SKU</label>
                    <div class="col-sm-6"><input id="sku" type="text" class="form-control"></div></div>
                    
                    <div class="row"><label class="col-sm-3 col-form-label">Stock</label>
                    <div class="col-sm-6"><input id="stock" type="number" min="0" class="form-control"></div></div>
                    
                    <div class="row"><label class="col-sm-3 col-form-label">Valor</label>
                    <div class="col-sm-6"><input id="valor" type="number" min="0" class="form-control"></div></div>
                `,
                focusConfirm: false,
                showCancelButton: true,
                // cancelButtonColor: '#3085d6',
                confirmButtonText: 'Guardar',
                confirmButtonColor: '#3085d6',
                preConfirm: () => {
                    return [
                        this.nombre = document.getElementById('nombre').value,
                        this.sku = document.getElementById('sku').value,
                        this.stock = document.getElementById('stock').value,
                        this.valor = document.getElementById('valor').value,
                    ];
                }
            });
            if (this.nombre == "" || this.sku == "" || this.stock == "" || this.valor == "") {
                Swal.fire({
                    icon: "error",
                    title: "Falta Algo",
                    text: "Datos Incompletos",
                });
            }
            else {
                this.nuevoProducto();

                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                });
                Toast.fire({
                    icon: "success",
                    title: 'Producto Agregado Exitosamente!'
                })
            }
        },

        btnEditar: async function (id, nombre, sku, stock, valor) {
            await Swal.fire({
                title: "Editar Producto",
                html: `
                    <div class="row"><label class="col-sm-3 col-form-label">Nombre</label>
                    <div class="col-sm-6"><input id="nombre" value="`+ nombre + `" type="text" class="form-control"></div></div>

                    <div class="row"><label class="col-sm-3 col-form-label">SKU</label>
                    <div class="col-sm-6"><input id="sku" value="`+ sku + `" type="text" class="form-control"></div></div>
                    
                    <div class="row"><label class="col-sm-3 col-form-label">Stock</label>
                    <div class="col-sm-6"><input id="stock" value="`+ stock + `" type="number" min="0" class="form-control"></div></div>
                    
                    <div class="row"><label class="col-sm-3 col-form-label">Valor</label>
                    <div class="col-sm-6"><input id="valor" value="`+ valor + `" type="number" min="0" class="form-control"></div></div>
                `,
                focusConfirm: false,
                showCancelButton: true,
            }).then((result) => {
                if (result.value) {
                    nombre = document.getElementById('nombre').value,
                    sku = document.getElementById('sku').value,
                    stock = document.getElementById('stock').value,
                    valor = document.getElementById('valor').value,
                    this.editarProducto(id, nombre, sku, stock, valor);
                    Swal.fire(
                        'Actualizado!',
                        'El producto ha sido editado con exito',
                        'success'
                    )
                }
            });
        },

        btnBorrar: function (id, nombre) {
            Swal.fire({
                title: 'Estas Seguro de eliminar el producto: ' + nombre + '?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonTest: 'Borrar'
            }).then((result) => {
                if (result.value) {
                    this.borrarProducto(id);
                    Swal.fire(
                        'Eliminado!',
                        'El producto "' + nombre + '" ha sido eliminado correctamente.',
                        'success'
                    )
                }
            })
        },
        // PROCEDIMIENTOS
        // listar registros
        listarProductos: function(){
            axios.post(url,{opcion:4}).then(response =>{
                this.productos = response.data;
                // console.log(this.productos);
            });
        },

        // Agregar Nuevo
        nuevoProducto: function(){
            axios.post(url,{opcion:1, nombre:this.nombre, sku:this.sku, stock:this.stock, valor:this.valor}).then(response =>{
                this.listarProductos();
            });
            this.nombre= "";
            this.sku= "";
            this.stock= 0;
            this.valor= 0;
        },
        // Editar

        editarProducto:function(id, nombre, sku, stock, valor){
            axios.post(url,{opcion:2,id:id, nombre:nombre, sku:sku, stock:stock, valor:valor}).then(response =>{
                this.listarProductos();
            });
        },
        // Borrar
        borrarProducto: function(id){
            axios.post(url,{opcion:3,id:id}).then(response =>{
                this.listarProductos();
            });
        }

    },
    created: function () {
        this.listarProductos();
    },
    computed: {
        totalStock() {
            this.total = 0;
            for (let producto of this.productos) { 
                this.total += parseInt(producto.stock);
            }
            return this.total;
        }
    }

});