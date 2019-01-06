package com.example.andhika.letsbook.model
import com.google.gson.annotations.SerializedName


data class RegisterRequest(
    @SerializedName("email")
    val email: String?,
    @SerializedName("kata_sandi")
    val kataSandi: String?,
    @SerializedName("nama_pelanggan")
    val namaPelanggan: String?,
    @SerializedName("no_telepon")
    val noTelepon: String?
)