package com.example.andhika.letsbook.model
import com.google.gson.annotations.SerializedName


data class RegisterResponse(
    @SerializedName("datapelanggan")
    val datapelanggan: Datapelanggan?,
    @SerializedName("message")
    val message: String?,
    @SerializedName("success")
    val success: Boolean?
)

data class Data_pelanggan(
    @SerializedName("email")
    val email: String?,
    @SerializedName("foto_profile")
    val fotoProfile: String?,
    @SerializedName("id_pelanggan")
    val idPelanggan: String?,
    @SerializedName("kata_sandi")
    val kataSandi: String?,
    @SerializedName("nama_pelanggan")
    val namaPelanggan: String?,
    @SerializedName("no_telepon")
    val noTelepon: String?,
    @SerializedName("role")
    val role: String?,
    @SerializedName("saldo")
    val saldo: String?,
    @SerializedName("status")
    val status: String?
)