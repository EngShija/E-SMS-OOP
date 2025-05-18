<div class="modal fade" id="addRoom" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <form action="controllers/add-room-handler.php" method="POST" class=" col-sm-5 col-lg-5 col-xs-5">
            <div class="modal-content">
                <div class="modal-header bg-dark text-light">
                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel">ADD Room</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body login">
                    <div class="error-text">

                    </div>

                    <div class="form-floating mb-3 text-dark">
                        <input type="text" class="form-control" name="roomName" id="rm"
                            placeholder="Enter Room Name" required autofocus>
                        <label for="rm">Room Name/Number:</label>
                    </div>

                    <div class="form-floating mb-3 text-dark">
                        <input type="number" class="form-control" name="capacity" id="cas"
                            placeholder="Enter Class Name" required autofocus>
                        <label for="cas">Room Capacity:</label>
                    </div>

                </div>
                <div class="modal-footer bg-dark">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <div class="button">
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>
        </form>
    </div>
</div>
</div>