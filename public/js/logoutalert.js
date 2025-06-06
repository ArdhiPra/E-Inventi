document.getElementById('logout-btn')?.addEventListener('click', function (e) {
  Swal.fire({
    title: 'Yakin ingin keluar?',
    text: 'Sesi kamu akan berakhir dan perlu login ulang.',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya, keluar',
    cancelButtonText: 'Batal'
  }).then((result) => {
    if (result.isConfirmed) {
      document.getElementById('logout-form').submit();
    }
  });
});
