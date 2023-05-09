import { DataTable, convertJSON, makeEditable } from "./lib/table/module.js";

const dataTable = document.getElementById("dataTable");
const btnEdit = document.getElementById('btnEdit');

export default () => ({
  colors: [
    { id: 1, label: "Rsssed" },
    { id: 2, label: "Orange" },
    { id: 3, label: "Yellow" },
    { id: 4, label: "Red" },
    { id: 5, label: "Orange" },
    { id: 6, label: "Yellow" },
    { id: 7, label: "Red" },
    { id: 8, label: "Orange" },
    { id: 9, label: "Yellow" },
    { id: 10, label: "Red" },
    { id: 11, label: "Orange" },
    { id: '1ewe2', label: "Yellow" },
  ],
  init()
  {
    let datatable = new DataTable(dataTable, {
      type: "string",
      data: {
        headings: (Object.keys(this.colors[ 0 ])).concat([ 'Edit', 'Delete' ]),
        data: this.colors.map((item) => (Object.values(item)).concat([ '', '' ])),
      },
      rowRender: (rowValue, tr, _index) =>
      {
        // if (!tr.attributes) {
        //     tr.attributes = {}
        // }
        tr.attributes[ "data-id" ] = rowValue[ 0 ].data;
        tr.attributes[ "data-name" ] = rowValue[ 1 ].data;
        return tr;
      },
      columns: [
        {
          select: 2,
          render: (value, _td, _rowIndex, _cellIndex) =>
            `<button  class="btn btn-info btn-sm"  x-on:click="(e) => edit(e.target.parentElement.parentElement.dataset.id)">Edit</button>`,
        },
        {
          select: 3,
          render: (value, _td, _rowIndex, _cellIndex) =>
            `<button  class="btn btn-error btn-sm"  x-on:click="(e) => hapus(e.target.parentElement.parentElement.dataset.id)">Delete</button>`,
        },
      ],
    });
  },
  edit(id)
  {
    alert(id);
  },
  hapus(id)
  {
    alert(id);
  }
});