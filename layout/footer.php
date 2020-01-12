
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap4.4.1.min.js"></script>
<script>
    $('#payModal').on('show.bs.modal', function (event) {
        let button = $(event.relatedTarget);
        let pid = button.data('pid');
        let qty = button.data('qty');
        let price = button.data('price');
        let modal = $(this);
        modal.find('.modal-title').text('Detail for ' + qty + ' Followers $' + price);
        modal.find('#pid_hidden').val(pid);
    });
</script>
</body>
</html>