<div class="button-add-user">
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
    data-bs-target="#inviteModal" data-bs-whatever="@mdo">Invite</button>
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" 
    data-bs-target="#exampleModal" data-bs-whatever="@mdo">Host Seminar</button>
    <div class="modal fade" id="inviteModal" tabindex="-1" aria-labelledby="inviteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inviteModalLabel">Invite</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Add your invite form or content here -->
                <div class="modal-body">
                    <!-- Your invite form or content goes here -->
                    <p>Email Invite form goes here...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!-- Add other buttons if needed -->
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Host Seminar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <!-- Add your host seminar form or content here -->
                <div class="modal-body">
              <form method="POST" action="seminaradd.php" enctype="multipart/form-data">
                <div class="">
                  <label for="recipient-name" class="col-form-label">Banner Image:</label>
                  <input type="file" class="form-control" id="recipient-name" accept=".jpg,.png,.jpeg" name="img">
                </div>
                <div class="">
                  <label for="recipient-name" class="col-form-label"> Title </label>
                    <input type="text" class="form-control" id="recipient-name" name="Title">
                </div>
                <div class="">
                  <label for="recipient-name" class="col-form-label">Host ID:</label>
                  <input type="text" class="form-control" id="recipient-name" name="Host_Id">
                </div>
                <div class="">
                  <label for="recipient-name" class="col-form-label">Date & Time</label>
                  <input type="datetime-local" class="form-control" id="recipient-name" name="Date_Time">
                </div>
                <div class="">
                  <label for="recipient-name" class="col-form-label">Link:</label>
                  <input type="text" class="form-control" id="recipient-name" name="Link">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" name="submit" class="btn btn-primary">Confirm</button>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
</div>
