<!-- Your PHP CodeIgniter View -->
<div class="content">
    <h2 id="title">Register</h2>

    <!-- Flash message div -->

    <form action="<?=base_url('user/register')?>" method="POST">
        <div class="form-group row">
            <label for="username" class="col-sm-2 col-form-label" style="font-size: 25px; color: #387780; font-weight:bold;">Nama:</label>
            <div class="col-sm-4">
                <input type="text" id="nama" name="nama" class="form-control mt-3" placeholder="Nama">
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label" style="font-size: 25px; color: #387780; font-weight:bold;">Email:</label>
            <div class="col-sm-4">
                <input type="text" id="email" name="email" class="form-control mt-2" placeholder="Email">
            </div>
        </div>
        <div class="form-group row">
            <label for="password" class="col-sm-2 col-form-label" style="font-size: 25px; color: #387780; font-weight:bold;">Password:</label>
            <div class="col-sm-4">
                <input type="password" id="password" name="password" class="form-control mt-2" placeholder="Password">
            </div>
        </div>
        <div class="form-group">
            <div class="offset-sm-2 col-sm-4">
                <button class="btn" type="submit" style="background-color:#387780; margin-left: 120px; color:white; padding: 10px;">Register</button>
            </div>
        </div>
    </form>
</div>


