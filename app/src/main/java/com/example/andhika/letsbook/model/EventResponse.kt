package com.example.andhika.letsbook.model
import com.google.gson.annotations.SerializedName


data class EventResponse(
    @SerializedName("listevent")
    val listevent: List<Listevent>?,
    @SerializedName("status")
    val status: Boolean?
)

data class Listevent(
    @SerializedName("gambar_poster")
    val gambarPoster: String?,
    @SerializedName("harga_tiket")
    val hargaTiket: String?,
    @SerializedName("id_event")
    val idEvent: String?,
    @SerializedName("biaya_pelayanan")
    val biaya: String?,
    @SerializedName("jam_event")
    val jamEvent: String?,
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
    @SerializedName("nama_kategori")
    val namaKategori: String?,
    @SerializedName("nama_organisasi")
    val namaOrganisasi: String?,
    @SerializedName("quota_peserta")
    val quotaPeserta: String?,
    @SerializedName("tanggal_event")
    val tanggalEvent: String?,
    @SerializedName("tiket_terjual")
    val tiketTerjual: String?
)