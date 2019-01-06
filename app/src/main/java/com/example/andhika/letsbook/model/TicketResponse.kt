package com.example.andhika.letsbook.model
import com.google.gson.annotations.SerializedName


data class TicketResponse(
    @SerializedName("listaktiftransaksi")
    val listaktiftransaksi: List<Listaktiftransaksi>?
)

data class Listaktiftransaksi(
    @SerializedName("biaya_pelayanan")
    val biayaPelayanan: String?,
    @SerializedName("bukti_bayar")
    val buktiBayar: String?,
    @SerializedName("gambar_izin")
    val gambarIzin: String?,
    @SerializedName("gambar_poster")
    val gambarPoster: String?,
    @SerializedName("harga_tiket")
    val hargaTiket: String?,
    @SerializedName("id_event")
    val idEvent: String?,
    @SerializedName("id_kategori")
    val idKategori: String?,
    @SerializedName("id_pelanggan")
    val idPelanggan: String?,
    @SerializedName("id_penyelenggara")
    val idPenyelenggara: String?,
    @SerializedName("id_transaksi")
    val idTransaksi: String?,
    @SerializedName("izin_refund")
    val izinRefund: String?,
    @SerializedName("jam_event")
    val jamEvent: String?,
    @SerializedName("jumlah_tiket")
    val jumlahTiket: String?,
    @SerializedName("jumlah_tiket_refund")
    val jumlahTiketRefund: String?,
    @SerializedName("keterangan_event")
    val keteranganEvent: String?,
    @SerializedName("kontak_informasi")
    val kontakInformasi: String?,
    @SerializedName("link_lokasi")
    val linkLokasi: String?,
    @SerializedName("lokasi")
    val lokasi: String?,
    @SerializedName("nama_event")
    val namaEvent: String?,
    @SerializedName("pendapantan")
    val pendapantan: String?,
    @SerializedName("quota_peserta")
    val quotaPeserta: String?,
    @SerializedName("status_event")
    val statusEvent: String?,
    @SerializedName("status_pembayaran")
    val statusPembayaran: String?,
    @SerializedName("status_tiket")
    val statusTiket: String?,
    @SerializedName("tagihan")
    val tagihan: String?,
    @SerializedName("tanggal_event")
    val tanggalEvent: String?,
    @SerializedName("tiket_terjual")
    val tiketTerjual: String?,
    @SerializedName("total_tagihan")
    val totalTagihan: String?,
    @SerializedName("waktu_transaksi")
    val waktuTransaksi: String?
)