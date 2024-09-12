import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Desvanece el mensaje después de 3 segundos
setTimeout(function() {
    const alert = document.getElementById('error-alert');
    if (alert) {
        alert.style.opacity = '0';
    }
}, 3000);


document.getElementById('addButton').addEventListener('click', function(event) {
    event.preventDefault(); // Evita el comportamiento por defecto del botón, que puede ser el envío del formulario

    // Obtener el valor del campo "Excluir sitios"
    var excludeSitesInput = document.getElementById('excludeSites');
    var excludeSitesValue = excludeSitesInput.value.trim();

    // Obtener el campo oculto para "Excluir sitios"
    var excludeSitesHidden = document.getElementById('excludeSitesHidden');
    var excludeSitesList = document.getElementById('excludeSitesList');

    // Verificar si el campo tiene un valor
    if (excludeSitesValue !== '') {
        // Crear un nuevo elemento de lista para "Excluir sitios"
        var li = document.createElement('li');
        li.textContent = excludeSitesValue;

        // Agregar el nuevo elemento de lista al ul
        excludeSitesList.appendChild(li);

        // Actualizar el valor del campo oculto
        var currentHiddenValue = excludeSitesHidden.value.trim();
        if (currentHiddenValue !== '') {
            excludeSitesHidden.value += ',' + excludeSitesValue;
        } else {
            excludeSitesHidden.value = excludeSitesValue;
        }

        // Limpiar el campo de texto "Excluir sitios"
        excludeSitesInput.value = '';
    }
});

document.getElementById('dorks').addEventListener('focus', function() {
    var input = this;
    var prefix = 'site:gob.bo';
    
    // Si el valor del campo es exactamente el prefijo, limpiar el campo al hacer clic
    if (input.value.trim() === prefix) {
        input.value = '';
    }
});

document.getElementById('dorks').addEventListener('input', function() {
    var input = this;
    var prefix = 'site:gob.bo';
    
    // Si el campo empieza con el prefijo y tiene más texto después
    if (input.value.startsWith(prefix) && input.value.length > prefix.length) {
        // Permitir que se mantenga el texto adicional después del prefijo
        return; // No hace nada, permite que el usuario continúe escribiendo
    }
    
    // Si el campo está vacío, establecer el prefijo
    if (input.value.trim() === '') {
        input.value = prefix;
    }
});


