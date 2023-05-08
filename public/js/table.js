import { DataTable, convertJSON } from './lib/table/module.js';

const dataTable = document.getElementById('dataTable');

export default () => ({
  colors: [
    { id: 1, label: 'Red' },
    { id: 2, label: 'Orange' },
    { id: 3, label: 'Yellow' },
    { id: 4, label: 'Red' },
    { id: 5, label: 'Orange' },
    { id: 6, label: 'Yellow' },
    { id: 7, label: 'Red' },
    { id: 8, label: 'Orange' },
    { id: 9, label: 'Yellow' },
    { id: 10, label: 'Red' },
    { id: 11, label: 'Orange' },
    { id: 12, label: 'Yellow' },
  ],
  init()
  {
    let obj = {
      headings: Object.keys(this.colors[ 0 ]),
      data: []
    };
    this.colors.forEach(color =>
    {
      const row = [ color.id.toString(), color.label ];
      obj.data.push(row);
    });
    let datatable = new DataTable(dataTable, { data: obj });

  }
});