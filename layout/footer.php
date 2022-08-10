<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- assets plugin data tables -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<!-- load fontawesome -->
<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

<!-- load ckeditor -->
<!-- <script src="https://cdn.ckeditor.com/4.19.0/full/ckeditor.js"></script> -->

<!-- <script>
    CKEDITOR.replace('alamat', {
        filebrowserBrowseUrl: 'assets-template/ckfinder/ckfinder.html',
        filebrowserUploadUrl: 'assets-template/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        height: '400px'
    });
</script> -->

<script>
    $(document).ready(function () {
        $('#table').DataTable();
    });
</script>
</body>

</html>