<!-- Modal Edit User -->
<div class="modal fade modal-fullscreen-md-down" id="editUserModal" tabindex="-1" aria-labelledby="editUserLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <form id="edit-user" method="POST">
      @csrf
      @method("PUT")
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="editUserLabel">Ubah User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="id" id="id_user">
          <div class="input-form d-flex flex-wrap">
            <div class="form-floating mb-3 p-2 mx-2">
              <input type="text" class="form-control" id="name-edit" name="name" placeholder="Nama" required>
              <label for="name-edit">Nama</label>
            </div>
            <div class="form-floating mb-3 p-2 mx-2">
              <input type="email" class="form-control" id="email-edit" name="email" placeholder="Email" required>
              <label for="email-edit">Email</label>
            </div>
            <div class="form-floating mb-3 p-2 mx-2">
              <select class="form-select" id="role-edit" name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
              </select>
              <label for="role-edit">Role</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal Tambah User -->
<div class="modal fade modal-fullscreen-md-down" id="storeUserModal" tabindex="-1" aria-labelledby="addUserLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <form id="tambah-user" action="{{ route('users.store') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="addUserLabel">Tambah User</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="input-form d-flex flex-wrap">
            <div class="form-floating mb-3 p-2 mx-2">
              <input type="text" class="form-control" id="name" name="name" required>
              <label for="name">Nama</label>
            </div>
            <div class="form-floating mb-3 p-2 mx-2">
              <input type="email" class="form-control" id="email" name="email" required>
              <label for="email">Email</label>
            </div>
            <div class="form-floating mb-3 p-2 mx-2">
              <input type="password" class="form-control" id="password" name="password" required>
              <label for="password">Password</label>
            </div>
            <div class="form-floating mb-3 p-2 mx-2">
              <select class="form-select" id="role" name="role" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
              </select>
              <label for="role">Role</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- SCRIPT EDIT USER -->
<script>
  function editUser(id, name, email, role, url) {
    document.getElementById("id_user").value = id;
    document.getElementById("name-edit").value = name;
    document.getElementById("email-edit").value = email;
    document.getElementById("role-edit").value = role;

    const form = document.getElementById('edit-user');
    form.setAttribute('action', url);
  }
</script>