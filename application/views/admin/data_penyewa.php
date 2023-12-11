<style>
    .container {
        display: flex;
        flex-direction: column; 
        justify-content: center;
        align-items: center;
    }

    .card {
        color: #387780;
        margin-top: 10px;
        border: 1px solid #ddd;
        padding: 10px;
        width: 500px;
        background-color: #D9D9D9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        display: flex;
        flex-direction: column;
        align-items: flex-start; 
        position: relative; 
        margin-bottom: 20px;
    }

    .card-number {
        position: absolute;
        top: 0;
        right: 0; 
        background-color: #387780;
        color: #fff;
        padding: 5px 10px;
        border-radius: 5px;
        font-weight: bold;
    }

    .grid-item {
        margin-bottom: 10px;
        font-size: 18px;
        font-weight: bold;
    }

    .row {
        display: flex;
        width: 100%;
    }

    .row .grid-item:last-child {
        margin-left: auto; 
    }
</style>
<div class="container">
    <div class="card">
        <div class="card-number">1</div>
        <div class="grid-item">Nama: Erfina</div>
        <div class="grid-item">No Telp: 0823436373</div>
        <div class="grid-item">Tgl Sewa: 25-07-2000</div>
        <div class="grid-item">Jam Sewa: 08.00 - 10.00</div>
        <div class="row">
            <div class="grid-item" style="margin-left: 15px;">2 Jam x 45.000 </div>
            <div class="grid-item">Total: Rp. 90.000 </div>
        </div>
    </div>
    <div class="card">
        <div class="card-number">2</div>
        <div class="grid-item">Nama: Rama</div>
        <div class="grid-item">No Telp: 082337734373</div>
        <div class="grid-item">Tgl Sewa: 25-08-2000</div>
        <div class="grid-item">Jam Sewa: 08.00 - 10.00</div>
        <div class="row">
            <div class="grid-item" style="margin-left: 15px;">2 Jam x 45.000 </div>
            <div class="grid-item">Total: Rp. 90.000 </div>
        </div>
    </div>
</div>
