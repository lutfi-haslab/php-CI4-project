import Alpine from './lib/alpine/module.esm.js';
import dropdown from './dropdown.js'
import table from './table.js'

const btnEdit = document.getElementById('btnEdit')
Alpine.data('dropdown', dropdown)
Alpine.data('table', table)
btnEdit?.addEventListener("click", function() {
  alert("Button clicked!");
});

 
window.Alpine = Alpine
Alpine.start()

