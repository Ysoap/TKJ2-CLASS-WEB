<?php 
// session_start();
require("../../../../koneksi.php")
?>
    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Logout
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Logout</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        anda yakin untuk logout
      </div>
      <div class="modal-footer">
        <form action="" method="post">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">batal</button>
            <button type="submit" class="btn btn-primary" name="logout-yes">yakin</button>
        </form>
      </div>
    </div>
  </div>
</div>