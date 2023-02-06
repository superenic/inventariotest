<template>
  <div class="row fondo-blanco">
    <div class="col text-center">
      <img src="/images/r.jpeg" alt="reloj" height="200" />
    </div>
    <div class="col-6">
      <h2>{{producto.nombre}}</h2>
      <div>by Apple</div>
      <p>{{producto.descripcion}}</p>
    </div>
  </div>
</template>
<script>
const producto = window.producto;
export default {
    setup() {
        
    },
    data() {
        return {
            producto
        };
    }
}
</script>