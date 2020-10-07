$(document).ready(function () {
    $('#ubah-password').hide();
    $('#btn-batal-ubah-password').hide();
    $('#loading-bayar').hide();

    $('#tabelKeranjang').DataTable();
    $('#tabelMenu').DataTable();

    // $('.btn-jumlah').on('click', function () {
    //     var nama_menu = $(this).data('nama');
    //     var jumlah = $(this).data('jumlah');

    //     $('#nama_menu').val(nama_menu);
    //     $('#jumlah').val(jumlah);

    //     $('#ubahJumlah').modal('show');
    // })

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

    ///////////////////////////////////////////////////////////////

    //Kasir
    $('.btn-form-bayar').on('click', function () {

        var id_order = $(this).data('id');
        var jumlah_harga = $(this).data('jumlah');

        $('#id_order').val(id_order);
        $('#jumlah_harga').val(jumlah_harga);

        $('#total_bayar').keyup(function () {
            var bayar = document.getElementById("total_bayar").value;

            if (bayar > jumlah_harga)
                $('#bayar-kurang').hide();
            else
                $('#bayar-kurang').show();
            var total = document.getElementById("jumlah_harga").value;
            var bayar = document.getElementById("total_bayar").value;

            $('#kembalian').val(bayar - total);
        })

    })

    //Waiter

    //Jumlah Order
    $('.btn-jumlah-order').on('click', function () {
        var id = $(this).data('id');
        var nama = $(this).data('nama');

        $('#id_menu').val(id);
        $('#nama').val(nama);
    });

    // Edit Order
    $('.btn-edit-order').on('click', function () {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var jumlah = $(this).data('jumlah');

        $('#id_detail_order').val(id);
        $('#nama_menu').val(nama);
        $('#jumlah').val(jumlah);
    });

    // Hapus order
    $('.btn-delete-order').on('click', function () {
        id = $(this).data('id')

        $('.id_detail_order').val(id);
    });

    $('#btn-ubah-password').on('click', function () {
        $('#ubah-password').show();
        $('#btn-ubah-password').hide();
        $('#btn-batal-ubah-password').show();
    })

    $('#btn-batal-ubah-password').on('click', function () {
        $('#ubah-password').hide();
        $('#btn-batal-ubah-password').hide();
        $('#btn-ubah-password').show();
    })
});
