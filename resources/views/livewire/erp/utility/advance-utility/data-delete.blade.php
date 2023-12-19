<section>
    <div class="modal fade" id="conformation-modal">
        <div class="modal-dialog modal-dialog-centered text-center" role="document">
            <div class="modal-content tx-size-sm">
                <div class="modal-body text-center p-4 pb-5">
                    <button aria-label="Close" class="btn-close position-absolute" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
                    <i class="icon icon-close fs-70 text-danger lh-1 my-5 d-inline-block"></i>
                    <h4 class="text-danger">All Transaction/Data Will Erase After This Option</h4>
                    <h4 class="text-danger">Are You sure to continue ? </h4>
                    <button class="btn btn-primary pd-x-25" wire:click="yes">Yes</button>
                    <button class="btn btn-danger pd-x-25" data-bs-dismiss="modal" aria-label="Close">No</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="select-data-modal" tabindex="-1" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data Delete Criteria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="">
                        <div class="form-group mt-2">
                            <label for="group_name">Data Delete Criteria</label>
                            <select class="form-control form-control-sm" required>
                                <option>All Transaction</option>
                                <option>Masters With Transaction</option>
                                <option>Selective Transaction</option>
                                <option>Account Master</option>
                                <option>Product Master</option>
                                <option>Address Book</option>
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
            $('#conformation-modal').modal('show');
        });
        window.addEventListener('select-data-modal', event => {
            $('#conformation-modal').modal('hide');
            $('#select-data-modal').modal('show');
        });
    </script>
</section>