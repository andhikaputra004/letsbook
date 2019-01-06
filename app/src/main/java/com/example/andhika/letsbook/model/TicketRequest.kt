package com.example.andhika.letsbook.model
import com.google.gson.annotations.SerializedName


data class TicketRequest(
    @SerializedName("id_pelanggan")
    val idPelanggan: Int?
)