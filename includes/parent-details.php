
<div class="modal fade" id="prtdetails" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="container">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">PARENT DETAILS</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                    <div class="modal-body">
                        <div class="error-text">

                        </div>
                        
                    <span><h5>Full Name: </h5><p><?= " ". $parent['first_name']. " ". $parent['last_name'] ?></p></span>
                    <span><h5>Gender: </h5><p><?= " ". $parent['gender'] ?></p></span>
                    <span><h5>Physical Address:</h5><p> <?= " ". $parent['physical_address'] ?></p></span>
                    <span><h5>Email Address:</h5><p> <?= " ". $parent['email_address'] ?></p></span>
                    <span><h5>Phone Number: </h5><p><?= " ". $parent['phone'] ?></p></span>
                    <span><h5>Relationship: </h5><p><?= " ". $parent['relation'] ?></p></span>

                    </div>
                    <div class="modal-footer bg-dark">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    </div>
            </div>
        </div>
    </div>
</div>