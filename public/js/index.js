import Alpine from './lib/alpine/module.esm.js';
import dropdown from './dropdown.js'
import table from './table.js'

 
Alpine.data('dropdown', dropdown)
Alpine.data('table', table)

 
window.Alpine = Alpine
Alpine.start()

