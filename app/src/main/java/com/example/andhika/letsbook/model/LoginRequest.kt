package com.example.andhika.letsbook.model
import com.google.gson.annotations.SerializedName


data class LoginRequest(
    @SerializedName("email")
    val email: String?,
    @SerializedName("kata_sandi")
    val kataSandi: String?
)