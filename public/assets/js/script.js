$(document).ready(function () {
	// $('.tmbl-jumlah').on('click', function() {
	// 	var nama = $(this).data('nama');
	// 	var harga = $(this).data('harga');

	// 	$('#nama').val(nama);
	// 	$('#harga').val(harga);		

	// 	$('#jumlahPesan').modal('show');
	// })

	$('.btn-jumlah').on('click', function() {
		var nama_menu = $(this).data('nama');
		var jumlah = $(this).data('jumlah');

		$('#nama_menu').val(nama_menu);
		$('#jumlah').val(jumlah);		

		$('#ubahJumlah').modal('show');
	})

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
