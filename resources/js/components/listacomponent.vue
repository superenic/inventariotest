<template>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Example Component</div>
                <div class="card-body">
<div class="row fondo-blanco">
    <div class="col text-center">
        <img src="/images/r.jpeg" alt="reloj" height="200">
    </div>
    <div class="col-6">
        <h2>nombre</h2>
        <div>by Apple</div>
        <div>estado</div>

        <label class="form-label">calidad</label>
        <select class="form-select" name="calificacion">
        </select>
    </div>
    <div class="col">
        <h3 class="text-center">$10</h3>
            <div class="alert alert-success text-center">estado</div>
        <a href="#" class="btn btn-info w-100 btn-large">editar</a>
        <form action="#" method="POST">
            <input type="hidden" name="_method" value="DELETE">
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
const {href} = require("vue");
export default {
  data() {
    return {
    };
  },
  mounted() {},
};
</script>
