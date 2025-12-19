<!-- Modal Edit Rule -->
<div class="modal fade modal-fullscreen-md-down" id="editRuleModal" tabindex="-1" aria-labelledby="editRuleLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="editRuleLabel">Ubah Rule</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="edit-rule" action="" method="post">
          @method("put")
          @csrf
          <input type="hidden" name="id" id="id_rule">
          <div class="input-form d-flex flex-wrap">
            <div class="form-floating mb-3 p-2 mx-2">
              <input type="text" class="form-control" id="kode-depresi-edit" name="kode_depresi"
                placeholder="Kode Depresi" readonly>
              <label for="kode-depresi-edit">Kode Depresi</label>
            </div>
            <div class="form-floating mb-3 p-2 mx-2">
              <input type="number" class="form-control" id="min-edit" name="min" required>
              <label for="min-edit">Min</label>
            </div>
            <div class="form-floating mb-3 p-2 mx-2">
              <input type="number" class="form-control" id="max-edit" name="max" required>
              <label for="max-edit">Max</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Tambah Rule -->
<div class="modal fade modal-fullscreen-md-down" id="storeModal" tabindex="-1" aria-labelledby="addRuleLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="addRuleLabel">Tambah Rule</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="tambah-rule" action="{{ route('rules.store') }}" method="post">
          @csrf
          <div class="input-form d-flex flex-wrap">
            <div class="form-floating mb-3 p-2 mx-2">
              <input type="text" class="form-control" id="kode-depresi" name="kode_depresi" required>
              <label for="kode-depresi">Kode Depresi</label>
            </div>
            <div class="form-floating mb-3 p-2 mx-2">
              <input type="number" class="form-control" id="min" name="min" required>
              <label for="min">Min</label>
            </div>
            <div class="form-floating mb-3 p-2 mx-2">
              <input type="number" class="form-control" id="max" name="max" required>
              <label for="max">Max</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script>
  function updateInputRule(id, kode, min, max) {
    document.getElementById("id_rule").value = id;
    document.getElementById("kode-depresi-edit").value = kode;
    document.getElementById("min-edit").value = min;
    document.getElementById("max-edit").value = max;
  }

  function actionUbahRule(url) {
    const form = document.getElementById('edit-rule');
    form.setAttribute('action', url);
    form.setAttribute('method', 'POST');
  }
</script>