package com.example.andhika.letsbook.model
import com.google.gson.annotations.SerializedName


data class RefundRequest(
    @SerializedName("id_pelanggan")
    val idPelanggan: Int?,
    @SerializedName("id_transaksi")
    val idTransaksi: Int?,
    @SerializedName("status_tiket")
    val status: String?
)