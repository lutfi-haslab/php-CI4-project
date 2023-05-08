<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tailwind Admin Template</title>
  <meta name="author" content="David Grzyb">
  <meta name="description" content="">

  <!-- Tailwind & daisyui-->
  <link href="https://cdn.jsdelivr.net/npm/daisyui@2.51.6/dist/full.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <style type="text/tailwindcss">
    @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');
    [x-cloak] { 
      display: none !important; 
    }

    .font-family-karla {
      font-family: karla;
    }

    .bg-sidebar {
      background: #3d68ff;
    }

    .cta-btn {
      color: #3d68ff;
    }

    .upgrade-btn {
      background: #1947ee;
    }

    .upgrade-btn:hover {
      background: #0038fd;
    }

    .active-nav-link {
      background: #1947ee;
    }

    .nav-item:hover {
      background: #1947ee;
    }

    .account-link:hover {
      background: #3d68ff;
    }

    @layer base {

      /* Override datatable */
      table {
        @apply  min-w-max w-full table-auto;
      }

      .datatable-table > thead > tr {
        @apply bg-gray-200 text-gray-600 uppercase text-sm leading-normal;
      }
      

      .datatable-table > thead > tr > th {
        @apply py-3 px-6 text-center;
      }

      .datatable-table > tbody {
        @apply text-gray-600 text-sm font-medium;
      }

      .datatable-table > tbody > tr {
        @apply border-b border-gray-200 hover:bg-blue-200;
      }

      .datatable-table > tbody > tr > td {
        @apply py-3 px-6 text-left whitespace-nowrap;
      }

      .datatable-wrapper {
        @apply  bg-blue-200 p-2 rounded-md;
      }

      .datatable-top {
        @apply flex justify-between p-4 text-black;
      }

      .datatable-top > .datatable-dropdown {
        @apply bg-white h-8 px-4 flex items-center rounded-md;
      }

      .datatable-top > .datatable-dropdown > label > select {
        @apply border border-black rounded-sm bg-white;
      }
      .datatable-top > .datatable-search > .datatable-input{
        @apply bg-white shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none;
      }

      .datatable-container {
        @apply bg-white m-4 rounded-md;
      }

      .datatable-bottom {
        @apply flex flex-col p-4 space-x-4 space-y-4 sm:justify-end text-black;
      }

      .datatable-bottom > .datatable-info {
        @apply bg-white px-4 h-8 w-full rounded-md flex break-all items-center;
      }

      .datatable-pagination-list {
        @apply flex space-x-4;
      }

      .datatable-pagination-list-item {
        @apply w-8 h-8  rounded-md bg-white cursor-pointer;
      }
      .datatable-pagination-list-item.datatable-active {
        @apply w-8 h-8 rounded-md bg-blue-400 text-white cursor-pointer;
      }

      .datatable-pagination-list-item-link {
        @apply w-full h-full flex items-center justify-center;
      }
    }
  </style>
</head>

<body class="bg-gray-100 font-family-karla flex">

  <?= $this->include('layout/sidebar') ?>

  <div class="relative w-full flex flex-col h-screen overflow-y-hidden">
    <!-- Desktop Header -->
    <?= $this->include('layout/desktop_header') ?>
    <!-- Mobile Header & Nav -->
    <?= $this->include('layout/mobile_header') ?>
    <!-- Main Field Content -->
    <div class="w-full h-screen overflow-x-hidden border-t flex flex-col">
      <main class="w-full flex-grow p-6">
        <?= $this->renderSection('content') ?>
      </main>

      <footer class="w-full bg-white text-right p-4">
        Built by <a target="_blank" href="https://davidgrzyb.com" class="underline">Lutfi Ikbal Majid</a>.
      </footer>
    </div>

  </div>

  <!-- Main Module-->
  <script src="<?= base_url('js/index.js') ?>" type="module" defer></script>
  <script src="<?= base_url('js/path-handler.js') ?>" type="module" defer></script>
  <!-- Font Awesome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
    integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
</body>

</html>