<template>
  <form method="POST" v-on:submit.prevent="alEnviar">
    <input type="hidden" v-model="mockProducto._method" name="_method" value="POST" />
    <div class="mb-3">
      <label v-modelmockProducto.="skue" name="skue" class="form-label">sku</label>
      <input type="text" class="form-control" v-model="mockProducto.sku" name="sku" />
    </div>
    <div class="mb-3">
      <label class="form-label">nombre</label>
      <input type="text" class="form-control" v-model="mockProducto.nombre" name="nombre" />
    </div>
    <div class="mb-3">
      <label class="form-label">descripcion</label>
      <input type="text" class="form-control" v-model="mockProducto.descripcion" name="descripcion" />
    </div>
    <div class="mb-3">
      <label class="form-label">precio</label>
      <input type="number" class="form-control" v-model="mockProducto.precio" name="precio" />
    </div>
    <div class="mb-3">
      <label class="form-label">cantidad</label>
      <input type="number" class="form-control" v-model="mockProducto.cantidad" name="cantidad" />
    </div>
    <h3>Categorias</h3>
    <ul class="list-group" style="overflow: auto; height: 400px">
      <label>
        <li :key="ca.id" v-for="ca in categorias" class="list-group-item">
          <input  type="checkbox" name="categoria_id[]" :value="ca.id"/>
          {{ca.descripcion}} 
        </li>
      </label>
    </ul>
    <div class="mb-3">
      <label class="form-label">calidad</label>
      <select
        class="form-select"
        aria-label="Default select example"
        v-model="mockProducto.calificacion" name="calificacion">
        <option v-for="cal in calificaciones" :key="cal" :value="cal">{{cal}} estrellas</option>
      </select>
    </div>

    <button class="btn btn-success" :disabled="enviando.activo">enviar</button>
  </form>
</template>
<script>
const axios = require("axios");
const calificaciones = [1,2,3,4,5];
const categorias = window.categorias;
const { reactive } = require("vue");
let enviando = reactive({activo:false});
let mockProducto = {
  _method: null,
  skue: null,
  sku: null,
  nombre: null,
  descripcion: null,
  precio: null,
  cantidad: null,
  categoria_id: [],
  calificacion: null
};
if (typeof producto !== 'undefined') {
  mockProducto = producto;
}
function alEnviar(e) {
  e.preventDefault;
  const form = e.target;
  const enviador =  new FormData(form);
  let url =  rutas.index;
  let method = 'POST';
  if (typeof producto !== 'undefined') {
    method = 'PATCH';
    url += '/' + producto.id;
  }
  const data = {
    _method: method,
    skue: enviador.get('skue'),
    sku: enviador.get('sku'),
    nombre: enviador.get('nombre'),
    descripcion: enviador.get('descripcion'),
    precio: enviador.get('precio'),
    cantidad: enviador.get('cantidad'),
    categoria_id: enviador.get('categoria_id'),
    calificacion: enviador.get('calificacion'),
    categoria_id: Array.from(form.querySelectorAll('input:checked')).map(i => i.value),
  };
  enviando.activo =  true;
  axios.post(url, data)
  .then(r => {
    alert('se ha guardado el registro');
    if (typeof producto === 'undefined') {
      form.reset();
    }
  })
  .catch(error => {
    alert('se ha encontrado un error en la peticion');
    console.error(error);
  })
  .finally(() => {enviando.activo= false;});
}
export default {
  setup() {

  },
  data() {
    return {
      calificaciones,
      categorias,
      alEnviar,
      mockProducto,
      enviando
    };
  },
  mounted() {
    if (typeof categoriaProducto !== undefined) {
      categoriaProducto.forEach(v => {
        const e = document.querySelector("input[type='checkbox'][value='"+v+"']")
        if (e) e.checked = true;
      });
    }
  }
}
</script>