<template>
  <form method="POST" v-on:submit.prevent="alEnviar">
    <input type="hidden" name="_method" value="POST" />
    <div class="mb-3">
      <label name="skue" class="form-label">sku</label>
      <input type="text" class="form-control" name="sku" />
    </div>
    <div class="mb-3">
      <label class="form-label">nombre</label>
      <input type="text" class="form-control" name="nombre" />
    </div>
    <div class="mb-3">
      <label class="form-label">descripcion</label>
      <input type="text" class="form-control" name="descripcion" />
    </div>
    <div class="mb-3">
      <label class="form-label">precio</label>
      <input type="number" class="form-control" name="precio" />
    </div>
    <div class="mb-3">
      <label class="form-label">cantidad</label>
      <input type="number" class="form-control" name="cantidad" />
    </div>
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
        name="calificacion">
        <option v-for="cal in calificaciones" :key="cal" :value="cal">{{cal}} estrellas</option>
      </select>
    </div>

    <button class="btn btn-success">enviar</button>
  </form>
</template>
<script>
const axios = require("axios");
const calificaciones = [1,2,3,4,5];
const categorias = window.categorias;
function alEnviar(e) {
  e.preventDefault;
  const form = e.target;
  const enviador =  new FormData(form);
  const url =  rutas.index;
  const data = {
    _method: 'POST',
    skue: enviador.get('skue'),
    sku: enviador.get('sku'),
    nombre: enviador.get('nombre'),
    descripcion: enviador.get('descripcion'),
    precio: enviador.get('precio'),
    cantidad: enviador.get('cantidad'),
    categoria_id: enviador.get('categoria_id'),
    calificacion: enviador.get('calificacion'),
    categoria_id: Array.from(form.querySelectorAll('input:checked')).map(i => i.value)
  };
  const options = {
        Headers: {
            Accept: "application/json"
        },
        data,
    };
  axios.post(url, data)
  .then(r => {
    alert('se ha guardado el registro');
    form.reset();
  })
  .catch(error => {
    alert('se ha encontrado un error en la peticion');
    console.error(error);
  })
  .finally(() => {});
}
export default {
  setup() {
    
  },
  data() {
    return {
      calificaciones,
      categorias,
      alEnviar
    };
  }
}
</script>