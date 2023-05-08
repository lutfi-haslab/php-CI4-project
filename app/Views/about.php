<?= $this->extend('layout/default') ?>

<?= $this->section('content') ?>
<h1 class="text-3xl text-black pb-6">Blank Page</h1>
<div class="container">
    <div x-data="dropdown">
        <button @click="toggle">Button</button>
        <button @click="callApi">Call Api</button>

        <div x-show="open" x-cloak>
            <p>Halo</p>
        </div>
    </div>
    <div x-data="table" x-init="init" class="w-full h-full">
        <table id="dataTable"></table>
    </div>
</div>
<?= $this->endSection() ?>