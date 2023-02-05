<template>
<div>
    <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body" v-for="producto in reactivo.productos" :key="producto.id">
          <div class="row fondo-blanco">
            <div class="col text-center">
              <img src="/images/r.jpeg" alt="reloj" height="200" />
            </div>
            <div class="col-6">
              <h2>{{producto.nombre}}</h2>
              <div>by Apple</div>
              <div>{{producto.estado}}</div>

              <label class="form-label">calidad</label>
              <select class="form-select" name="calificacion" v-model="producto.calificacion">
                <option
                  v-for="calificacion in calificaciones"
                  :value="calificacion"
                  :key="calificacion"
                >
                  {{ calificacion }} estrellas
                </option>
              </select>
            </div>
            <div class="col">
              <h3 class="text-center">${{producto.precio}}</h3>
              <div v-if="producto.estado == 'con inventario'" class="alert alert-success text-center">{{producto.estado}}</div>
              <div v-if="producto.estado == 'sin inventario'" class="alert alert-danger text-center">{{producto.estado}}</div>
              <a :href="producto.rutaEditar" class="btn btn-info w-100 btn-large">editar</a>
              <form action="#" method="POST">
                <input type="hidden" name="_method" value="DELETE" />
                <button class="btn btn-danger w-100 btn-large">eliminar</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<script>
const { reactive } = require("vue");
const calificaciones = [1, 2, 3, 4, 5];
const axios = require('axios');
const rutaGetProductos = rutas.index;
const reactivo = reactive({productos: []});
reactivo.cargando =  true;
export default {
  setup() {
    const options = {
        Headers: {
            Accept: "application/json"
        }
    }
    axios.get(rutaGetProductos, options).then(r => {
        const {data} = r;
        reactivo.productos = data.map(producto => {
            producto.rutaEditar = rutas.index + producto.id;
            return producto;
        });
    }).finally(() => {
        reactivo.cargando = false;
    });
  },
  data() {
    return {
      calificaciones,
      reactivo,
    };
  },
  mounted() {},
};
</script>
