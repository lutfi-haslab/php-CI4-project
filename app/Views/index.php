<?= $this->extend('layout/default') ?>
<?= $this->section('content') ?>
<h1 class="text-3xl text-black pb-6">Blank eePage</h1>
<div class="container">
    <h1>Hola</h1>
    <div class="alert alert-info shadow-lg">
        <div>
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                class="stroke-current flex-shrink-0 w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>New software update available.</span>
        </div>
    </div>
    <button class="btn btn-primary">Button</button>

</div>
<?= $this->endSection() ?>