<div class="d-flex justify-content-center">
    <div class="card text-center bg-dark text-light mb-3 mt-3" style="max-width:fit-content; ">
        <div class="card-body">
        <?php
    if(check_session('uploaded') == true){
        sweetAlert('Sorry',' Profile image uploaded successfully',  'success');
display_alert('success', 'Success!', ' Profile image uploaded successfully.');
cancel_session('uploaded');
    }
    else if(check_session('exist')){
        sweetAlert('Sorry',$_SESSION['exist'],  'warning');
        cancel_session('exist');
    }
    else if(check_session('validationError')){
        sweetAlert('Sorry',$_SESSION['validationError'],  'warning');
        cancel_session('validationError');
    }
?>
            <h2 class="card-title">
                PROFILE IMAGE
            </h2>
<form action="controllers/add-profile-image.php" method="post" enctype="multipart/form-data" class="form-group ">
    <label for="profileImage" class="form-label">Upload Profile Image:</label>
    <input type="file" name="profileImage" id="profileImage" class="form-control" required>
    <button type="submit" class="btn btn-primary mt-3">Upload</button>
</form>
        </div>
    </div>
</div>
