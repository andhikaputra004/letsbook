package com.example.andhika.letsbook.model
import com.google.gson.annotations.SerializedName


data class EventRequest(
    @SerializedName("id_kategori")
    val idKategori: Int?
)