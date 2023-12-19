<section>
    <div class="modal fade" id="update-balance-modal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Balance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="">
                        <div class="form-group mt-2">
                            <label for="group_name">Update Product Stock?</label>
                            <select class="form-control form-control-sm" required>
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                            </select>
                        </div>
                        <input type="submit" id="addButton" class="d-none">
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn me-auto modalCloseButton" data-bs-dismiss="modal">Close</button>
                    <label for="addButton" class="btn btn-primary">Ok</label>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#update-balance-modal').modal('show');
        });
    </script>
</section>