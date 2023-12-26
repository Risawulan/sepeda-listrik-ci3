<div class="content">
    <h2 id="title">Login</h2>
    <?php if ($this->session->flashdata('success')): ?>
        <div id="success-message" class="alert alert-success" style="display:none;">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <form action="<?= base_url('user/login') ?>" method="POST">
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label" style="font-size: 25px; color: #387780; font-weight:bold;">Email:</label>
      
            <div class="col-sm-4">
                <input type="text" id="email" name="email" class="form-control mt-3" placeholder="Email">
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
                <button class="btn" type="submit" style="background-color:#387780; margin-left: 120px; color:white; padding: 10px;">Login</button>
            </div>
        </div>
    </form>
</div>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function() {
        if ($("#success-message").length) {
            $("#success-message").fadeIn().delay(3000).fadeOut();
        }
    });
</script>