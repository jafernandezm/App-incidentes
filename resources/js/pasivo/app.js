

document.getElementById('addButton').addEventListener('click', function() {
    // Obtener el valor del campo de texto
    var dorkInput = document.getElementById('dorks');
    var dorkValue = dorkInput.value;

    if (dorkValue.trim() !== '') {
        // Crear un nuevo elemento de lista
        var li = document.createElement('li');
        li.textContent = dorkValue;

        // Agregar el nuevo elemento de lista al ul
        document.getElementById('dorkList').appendChild(li);

        // Limpiar el campo de texto
        dorkInput.value = '';
    }
});