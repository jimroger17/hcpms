<script src="../js/bootstrap.js"></script>
<script src="../js/jquery.min.js"></script>
<script src="../js/dropdown.js"></script>
<script src="../js/sidebar.js"></script>
<script src="../js/jquery.dataTables.js"></script>
<script src="../js/custom.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        // Initialize DataTables
        $('#table').DataTable();
        $('#table1').DataTable();

        // Modal handling
        $('#show_itr').on('click', function () {
            $('#addPatientModal').modal('show');
        });

        $('.close, [data-dismiss="modal"]').on('click', function () {
            $('#addPatientModal').modal('hide');
        });
    });
	$(document).on('hidden.bs.modal', '#addPatientModal', function () {
    // Ensure the button remains visible after the modal closes
    $('#show_itr').show();
});
</script>

