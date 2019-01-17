package com.example.andhika.letsbook.model
import com.google.gson.annotations.SerializedName


data class RefundResponse(
    @SerializedName("message")
    val message: String?
)