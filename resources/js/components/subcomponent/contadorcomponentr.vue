<template>
  <div class="input-group mb-3">
    <button
      class="btn btn-outline-secondary"
      type="button"
      @click="cambiarCantidad(-1)"
    >
      -
    </button>
    <input
      type="number"
      class="form-control"
      @change="cambiarCantidad(0)"
      v-model="producto.cantidad"
    />
    <button
      class="btn btn-outline-secondary"
      type="button"
      @click="cambiarCantidad(1)"
    >
      +
    </button>
  </div>
</template>
<script>
export default {
  props: ["producto"],
  setup(props) {
    const producto = props.producto;
    const cambiarCantidad = (cantidad) => {
      producto.cantidad = parseInt(producto.cantidad) + parseInt(cantidad);
      const ruta = rutas.index + "/cambiarCantidad/" + producto.id;
      const data = {
        cantidad: producto.cantidad,
      };
      const response = axios.put(ruta, data);
      response
        .catch((error) => {
          alert("se encontro un error al actualiar la calificacion");
          console.error(error);
        })
        .finally(() => {
          alert("se cambio exitosamente");
        });
    };
    return {
      producto,
      cambiarCantidad,
    };
  },
  data() {
    return {
      producto,
      cambiarCantidad,
    };
  },
};
</script>
