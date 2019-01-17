package com.example.andhika.letsbook.model
import com.google.gson.annotations.SerializedName


data class TransaksiRequest(
    @SerializedName("id_event")
    val idEvent: Int?,
    @SerializedName("id_pelanggan")
    val idPelanggan: Int?,
    @SerializedName("jumlah_tiket")
    val jumlahTiket: Int?,
    @SerializedName("total_tagihan")
    val totalTagihan: Int?
)