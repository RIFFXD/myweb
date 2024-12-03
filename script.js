// Menunggu tombol diklik dan menampilkan cerita
document.getElementById("showStory").addEventListener("click", function() {
    // Menampilkan elemen cerita dengan menambahkan kelas 'show'
    var story = document.getElementById("story");
    story.classList.toggle("show"); // Toggle efek muncul dan sembunyi
});
