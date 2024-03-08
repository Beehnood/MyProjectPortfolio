<?php include "../../layout/head.php"; ?>


<div class="container">
    <div class="row">
        <div class="col-12 py-4">
            <h2>Add Service</h2>
        </div>

    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="">
                        <!-- First Input -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Example textarea</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="title">
                        </div>

                        <!-- Second Input -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>



            </div>
        </div>
    </div>
</div>




<?php include "../../layout/footer.php"; ?>