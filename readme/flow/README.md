<h4> Alur : </h4>

- PENDING (Pending) <br/>
 USER => 
  - user dapat membatalkan kursus

 - ADMIN =>
  - admin dapat menolak kursus
  - admin dapat menerima kursus setelah itu status menjadi payment (pembayaran) 

- PAYMENT (Pembayaran)
 - USER =>
  - user dapat membatalkan kursus

 - ADMIN => 
  - admin dapat mengagalkan kursus jika pembayaran sudah kadaluarsa
  - admin dapat memvalidasi pembayaran manual setelah itu status menjadi waiting (menunggu)

- WAITING (Menunggu)
 - USER => 
  - user dapat membatalkan

 - ADMIN =>
  - admin dapat mengubah status menjadi running (berjalan)

- RUNNING (Berjalan)
 - USER => 
  - user dapat membatalkan

 - ADMIN =>
  - admin dapat mengubah status menjadi success (berhasil)

- SUCCESS (Berhasil)
 - Kursus Telah Selesai

- FAILED (Gagal)
 - Kursus Telah Gagal

- CANCELED (Dibatalkan)
 - Kursus Telah Dibatalkan

- REJECTED (Ditolak)
 - Kursus Telah Ditolak
