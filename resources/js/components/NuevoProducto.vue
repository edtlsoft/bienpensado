<template>
    <div class="modal" id="modal-crear-producto" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Crear producto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-group" @submit.prevent="guardarProducto">
                        <div class="form-group">
                            <label>Nombre producto</label>
                            <input type="text" class="form-control" placeholder="Iphone"
                                v-model="producto.nombre">
                        </div>

                        <div class="form-group">
                            <label>Cantidad</label>
                            <input type="number" class="form-control" placeholder="Password"
                                v-model="producto.cantidad">
                        </div>

                        <div class="form-group">
                            <label>Estado</label>
                            <select class="form-control" v-model="producto.estado">
                                <option value="1" selected>Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Bodega</label>
                            <select class="form-control" v-model="producto.bodega">
                                <option v-for="bodega in bodegas" :value="bodega.id" v-text="bodega.nombre" :key="bodega.id"></option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Observacion</label>
                            <textarea class="form-control" rows="5" v-model="producto.observacion"></textarea>
                        </div>

                        <div>
                            <p v-text="respuesta_server"></p>
                        </div>


                        <button type="submit" class="btn btn-primary form-control">Guardar producto</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

// EventBus
import EventBus from './../EventBus';

export default { 
    data: function() {
        return({
            producto: {
                nombre: '',
                cantidad: 0,
                estado: 1,
                bodega: '',
                observacion: '',
            },
            bodegas: [],
            respuesta_server: '',
        })
    },
    methods: {
        guardarProducto: function(){
            let me       = this;
            let producto = me.producto;

            axios.post('/producto/store', producto)
            .then(response => {
                console.log(response);

                me.vaciarFormulario();

                EventBus.$emit('recargarTablaProductos');

                this.respuesta_server = response.data.mensaje;
            })
            .catch(errors => console.log(errors));
        },

        vaciarFormulario: function() {
            this.producto = {
                nombre: '',
                cantidad: 0,
                estado: 1,
                bodega: '',
                observacion: '',
            };
        },

        cargarBodegas: function() {
            axios.get('/bodegas')
            .then(response => {
                this.bodegas = response.data.bodegas;
            })
            .catch(errors => console.log(errors));
        }
    },
    mounted: function() {
        this.cargarBodegas();
    }
}
</script>
