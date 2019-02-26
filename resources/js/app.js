
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


Vue.component('crear-producto', require('./components/NuevoProducto.vue').default);
//import nuevoProducto from './components/NuevoProducto.vue';

// EventBus
import EventBus from './EventBus';

const app = new Vue({
    el: '#app',
    data: {
        search: '',
        productos: [],
    },
    created: function(){
        EventBus.$on('recargarTablaProductos', () => { this.cargarListadoDeProductos() })
    },
    methods: {
        cargarListadoDeProductos: function() {
            axios.get('/productos', {
                search: this.search,
            })
            .then(response => {
                this.productos = response.data.productos.data;
            })
            .catch(errors => console.log(errors))
        },

        cambiarEstado: function(id_producto, estado) {
            let estado_producto = estado == 1 ? '0' : '1';

            Swal.fire({
                title: 'Esta seguro de cambiar el estado?',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
              }).then((result) => {
                if (result.value) {
                    axios.post('/producto/update_estado',{
                        id_producto: id_producto,
                        estado: estado_producto,
                    })
                    .then(response => {
                        Swal.fire(
                            'Actualizado!',
                            'El estado del producto se actualizo correctamente.',
                            'success'
                        );

                        this.cargarListadoDeProductos();
                    })
                    .catch(errors => console.log(errors));
                    
                }
            })
        },

        buscarProductos: function() {
            this.cargarListadoDeProductos();
        }
    },
    mounted: function() {
        //alert('mounted');
        this.cargarListadoDeProductos();
    }
});
