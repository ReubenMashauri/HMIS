<div class="container">
<div class="jumbotron">
            <form action="index.php?page=savedrug" method="post" role="form" name="f">
                <div class="card">
                <div class="card-header"><?= " ADD THE DRUGS TO THE STORE  "?></div>
                <div class="card-body">
                <div class="form-group">
                <label for="">DRUD NAME</label>
                <input type="text" name="drugname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">COST</label>
                        <input type="text" name="cost" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="submit" value="ADD DRUG" class="btn btn-primary">
                    </div>
                </div>
                </div>
                </form>
</div>
</div>