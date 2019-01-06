package com.example.andhika.letsbook.model
import com.google.gson.annotations.SerializedName


data class EventResponse(
    @SerializedName("listevent")
    val listevent: List<Listevent>?,
    @SerializedName("status")
    val status: Boolean?
)

data class Listevent(
    @SerializedName("alamat")
    val alamat: String?,
    @SerializedName("biaya_pelayanan")
    val biayaPelayanan: String?,
    @SerializedName("bukti_bayar")
    val buktiBayar: String?,
    @SerializedName("deskripsi_penyelenggara")
    val deskripsiPenyelenggara: String?,
    @SerializedName("email")
    val email: String?,
    @SerializedName("foto_kartu_identitas")
    val fotoKartuIdentitas: String?,
    @SerializedName("foto_legalitas")
    val fotoLegalitas: String?,
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
    @SerializedName("id_penyelenggara")
    val idPenyelenggara: String?,
    @SerializedName("izin_refund")
    val izinRefund: String?,
    @SerializedName("jam_event")
    val jamEvent: String?,
    @SerializedName("jumlah_tiket_refund")
    val jumlahTiketRefund: String?,
    @SerializedName("kata_sandi")
    val kataSandi: String?,
    @SerializedName("keterangan_event")
    val keteranganEvent: String?,
    @SerializedName("kontak_informasi")
    val kontakInformasi: String?,
    @SerializedName("link_lokasi")
    val linkLokasi: String?,
    @SerializedName("logo_organisasi")
    val logoOrganisasi: String?,
    @SerializedName("lokasi")
    val lokasi: String?,
    @SerializedName("nama_bank")
    val namaBank: String?,
    @SerializedName("nama_event")
    val namaEvent: String?,
    @SerializedName("nama_kategori")
    val namaKategori: String?,
    @SerializedName("nama_organisasi")
    val namaOrganisasi: String?,
    @SerializedName("nama_pemilik_rekening")
    val namaPemilikRekening: String?,
    @SerializedName("nama_pengelola")
    val namaPengelola: String?,
    @SerializedName("no_telepon")
    val noTelepon: String?,
    @SerializedName("nomor_rekening")
    val nomorRekening: String?,
    @SerializedName("pendapantan")
    val pendapantan: String?,
    @SerializedName("quota_peserta")
    val quotaPeserta: String?,
    @SerializedName("role")
    val role: String?,
    @SerializedName("status")
    val status: String?,
    @SerializedName("status_event")
    val statusEvent: String?,
    @SerializedName("status_pembayaran")
    val statusPembayaran: String?,
    @SerializedName("tagihan")
    val tagihan: String?,
    @SerializedName("tanggal_event")
    val tanggalEvent: String?,
    @SerializedName("tiket_terjual")
    val tiketTerjual: String?
)