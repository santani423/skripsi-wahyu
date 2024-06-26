<script>
export function confirmDelete({then, text, title}) {
    Swal.fire({
        title: title ?? "Apa anda yakin?",
        text: text ?? "Menghapusnya secara permanen tidak dapat dikembalikan",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, Lakukan!",
    }).then(then);
}
</script>
