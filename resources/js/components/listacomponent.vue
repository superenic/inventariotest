<template>
<div>
    <div class="row justify-content-center">
    <div class="col-md-12">
      <div class="card">
        <div v-if="reactivo.cargando" class="text-center p-20">
          <div class="spinner-border" role="status">
            <span class="sr-only"></span>
          </div>
        </div>
        <div v-show="!reactivo.cargando" class="card-body" v-for="producto in reactivo.productos" :key="producto.id">
          <div class="row fondo-blanco">
            <div class="col text-center">
              <img src="/images/r.jpeg" alt="reloj" height="200" />
            </div>
            <div class="col-6">
              <a :href="rutas.vueIndex+ '/' + producto.id"><h2>{{producto.nombre}}</h2></a>
              <div>by Apple</div>
              <div>{{producto.estado}}</div>

              <label class="form-label">calidad</label>
              <select
                :productId="producto.id"
                @change="cambiarCalificacion"
                class="form-select"
                name="calificacion"
                v-model="producto.calificacion">
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
              <form action="#" method="POST" @submit="enviarBorrar">
                <input type="hidden" name="_method" value="DELETE" />
                <input type="hidden" name="productoId" :value="producto.id" />
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
const reactivo = reactive({productos: [], cargando:false});
function enviarBorrar(e)
{
  e.preventDefault();
  if (!confirm("Desea borrar el registro?")) {
    return;
  }
  const form = e.target;
  const enviador =  new FormData(form);
  const url =  rutas.index + '/' +enviador.get('productoId') ;
  const data = {
    _method: enviador.get('_method'),
  };
  axios.post(url, data)
    .then(r => {
      alert('se ha borrado el registro');
      window.location.replace(rutas.vueIndex);
    })
    .catch(error => {
      alert('se ha encontrado un error en la peticion');
      console.error(error);
    })
    .finally(() => {});
}

function cambiarCalificacion(e) {
  const target = e.target;
  const value = e.target.value;
  const productId = target.getAttribute("productId")
  const ruta = rutas.index + '/' + productId;
  const response = axios.put(ruta, { calificacion: value });
  target.disabled = true;
  response
    .catch((error) => {
      alert("se encontro un error al actualiar la calificacion");
      console.error(error);
    })
    .finally(() => {
      target.disabled = false;
      alert("se cambio exitosamente");
    });
}

export default {
  setup() {
    const options = {
        Headers: {
            Accept: "application/json"
        }
    }
    reactivo.cargando = true;
    axios.get(rutaGetProductos, options).then(r => {
        const {data} = r;
        reactivo.productos = data.map(producto => {
            producto.rutaEditar = rutas.vueIndex + '/' + producto.id + '/edit';
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
      cambiarCalificacion,
      rutas: window.rutas,
      enviarBorrar
    };
  },
  mounted() {},
};
</script>
