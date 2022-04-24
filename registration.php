<?php
echo '<form style="margin-top: 70px" method="post" action="createUser.php">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Login</label>
    <input type="text" name="login" class="form-control"  >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Firstname</label>
    <input type="text" name="firstname" class="form-control"  >
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Lastname</label>
    <input type="text" name="lastname" class="form-control"  >
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" >
  </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Repeat password</label>
    <input type="password" name="repPassword" class="form-control" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>';