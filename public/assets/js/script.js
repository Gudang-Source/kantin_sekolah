$(document).ready(function () {

	$('#tabelMenu').DataTable();
    // Admin
    // Edit menu
	$('.tmbl-edit-menu').on('click', function () {
		var id = $(this).data('id');
		var nama = $(this).data('nama');

		$('.id').val(id);
		$('.nama_menu').val(nama);

		$('#editMenu').modal('show');
	});

    // Hapus menu
	$('.tmbl-hapus-menu').on('click', function () {
		$('#hapusMenu').modal('show');
	});
});
