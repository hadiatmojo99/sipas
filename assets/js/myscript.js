const flashData = $('.flash-data').data('flashdata');
if(flashData){
  Swal.fire({
    title: 'Sukses',
    text: 'Data Berhasil ' + flashData,
    icon: 'success'
  })
}

const flashGagal = $('.flash').data('flashdata');
if(flashGagal){
  Swal.fire({
    title: 'Gagal',
    text: 'Data Gagal Disimpan',
    icon: 'error'
  })
}

$('.tombol-hapus').on('click', function (e){
  e.preventDefault();
  const href = $(this).attr('href');
    Swal.fire({
        title: 'Anda yakin ingin menghapusnya?',
        text: "Penghapusan tidak bisa dibatalkan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Batal',
        confirmButtonText: 'Hapus Data'
      }).then((result) => {
        if (result.isConfirmed) {
          document.location.href = href;          
        }
      })
})