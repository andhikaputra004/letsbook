package com.example.andhika.letsbook.network

import com.example.andhika.letsbook.model.*
import io.reactivex.Observable
import retrofit2.http.Body
import retrofit2.http.POST

interface NetworkService {

    @POST("pengguna/login")
    fun doLogin(@Body request: LoginRequest): Observable<LoginReponse>

    @POST("pelanggan/register")
    fun doRegister(@Body request: RegisterRequest): Observable<RegisterResponse>

    @POST("event/listbykategori")
    fun doGetListEvent(@Body request: EventRequest): Observable<EventResponse>

    @POST("transaksi/listalltransaksi")
    fun doGetTicket(@Body request: TicketRequest): Observable<TicketResponse>

}