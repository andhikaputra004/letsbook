package com.example.andhika.letsbook.model
import com.google.gson.annotations.SerializedName


data class TransaksiResponse(
    @SerializedName("message")
    val message: String?,
    @SerializedName("status")
    val status: Boolean?
)