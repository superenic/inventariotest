require('./bootstrap');
const axios = require('axios');

window.addEventListener('load', (event) => {
    const calificacioneSelect = document.querySelectorAll('select[name="calificacion"]');
    Array.from(calificacioneSelect).forEach((item) => {
        item.addEventListener('change', (e) => {
            const target = e.target;
            const value = e.target.value;
            const ruta = target.getAttribute('data-ruta');
            const response = axios.put(ruta, { calificacion: value});
            target.disabled = true;
            response.then((res) => res.json)
                .catch((error) => {
                    alert('se encontro un error al actualiar la calificacion');
                }).finally(() => {
                    target.disabled = false;
                    alert('se cambio exitosamente');
                });
        })
    });
});