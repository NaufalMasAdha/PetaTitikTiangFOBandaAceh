function sweetDelete() {
  Swal.fire({
    title: "Hapus data ini?",
    text: "Data tidak akan bisa dikembalikan!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Hapus",
  }).then((result) => {
    if (result.isConfirmed) {
      Swal.fire("Terhapus!", "Data berhasil dihapus", "success");
    }
  });
}
