document.getElementById('file_sa_1').addEventListener('change', function (e) {
    var files = e.target.files; // Obtiene los archivos seleccionados
    var fileNames = Array.from(files).map(file => file.name); // Obtiene los nombres de los archivos

    // Muestra los nombres de los archivos en el elemento con id 'fileNames'
    //document.getElementById('fileNames').textContent = fileNames.join(', ');
    document.getElementById('fileNames').innerHTML = fileNames.join('<br>');
});


function addMore_sa() {
    alert("upload_files.js");
    var e_numero_sa = document.getElementById("numero_sa");
    var numero_sa = e_numero_sa.value;
    numero_sa++;
    e_numero_sa.value = numero_sa;

    var e_indice_sa = document.getElementById("indice_sa");
    var indice_sa = e_indice_sa.value;
    indice_sa++;
    e_indice_sa.value = indice_sa;

    // Clonar el bloque HTML
    var bloqueClonado = document.getElementById("bloque_repetible_sa_1").cloneNode(true);
    bloqueClonado.id = "bloque_repetible_sa_" + indice_sa;
    bloqueClonado.style.margin = "15px 0px 0px 0px";

    var inputFile = bloqueClonado.querySelector('input[name="file_sa_1"]');
    inputFile.id = 'file_sa_' + indice_sa; // Establecer el nuevo id
    inputFile.name = 'file_sa_' + indice_sa; // Establecer el nuevo name
    inputFile.value = '';

    var aBtnRemoveSA = bloqueClonado.querySelector('a[id="btn_remove_sa_1"]');
    aBtnRemoveSA.style.display = "block";
    aBtnRemoveSA.id = "btn_remove_sa_" + indice_sa;

    var aBtnLimpiarSA = bloqueClonado.querySelector('a[id="btn_limpiar_sa_1"]');
    aBtnLimpiarSA.remove();

    // Agregar el bloque clonado al contenedor de bloques
    document.getElementById("contendedor-bloques-sa").appendChild(bloqueClonado);
}
