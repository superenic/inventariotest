<template>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Example Component</div>
        <div class="card-body">
          <div class="row fondo-blanco">
            <div class="col text-center">
              <img src="/images/r.jpeg" alt="reloj" height="200" />
            </div>
            <div class="col-6">
              <h2>nombre</h2>
              <div>by Apple</div>
              <div>estado</div>

              <label class="form-label">calidad</label>
              <select
                class="form-select"
                aria-label="Default select example"
                name="calificacion"
              >
                <option
                  v-for="c in listaCalificaciones"
                  :key="c.c"
                  :value="c.c"
                >
                  {{ c.descripcion }}
                </option>
              </select>
            </div>
            <div class="col">
              <h3 class="text-center">$10</h3>
              <div class="alert alert-success text-center">estado</div>
              <a href="#" class="btn btn-info w-100 btn-large">editar</a>
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
</template>

<script>
const axios = require("axios");

function cambiarCalificacion(e) {
  const target = e.target;
  const value = e.target.value;
  const ruta = target.getAttribute("data-ruta");
  const response = axios.put(ruta, { calificacion: value });
  target.disabled = true;
  response
    .then((res) => res.json)
    .catch((error) => {
      alert("se encontro un error al actualiar la calificacion");
    })
    .finally(() => {
      target.disabled = false;
      alert("se cambio exitosamente");
    });
}

export default {
  data() {
    const listaCalificaciones = [
      { v: 1, descripcion: "1 - estrella" },
      { v: 2, descripcion: "2 - estrella" },
      { v: 3, descripcion: "3 - estrella" },
      { v: 4, descripcion: "4 - estrella" },
      { v: 5, descripcion: "5 - estrella" },
    ];
    return {
      listaCalificaciones,
    };
  },
  mounted() {},
};
</script>
