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
        <div class="grid-item">id Sepeda: 001</div>
        <div class="grid-item">Nama Sepeda: Sepeda Pedal</div>
        <div class="grid-item">Harga Sewa: 45.000</div>
    </div>
    <div class="card">
        <div class="card-number">2</div>
        <div class="grid-item">id Sepeda: 002</div>
        <div class="grid-item">Nama Sepeda: Sepeda Pedal</div>
        <div class="grid-item">Harga Sewa: 50.000</div>
    </div>
   
</div>
