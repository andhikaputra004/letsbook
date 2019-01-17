package com.example.andhika.letsbook.network

import com.example.andhika.letsbook.model.*
import io.reactivex.Observable
import retrofit2.http.Body
import retrofit2.http.GET
import retrofit2.http.POST

interface NetworkService {

    @POST("pengguna/login")
    fun doLogin(@Body request: LoginRequest): Observable<LoginReponse>

    @POST("pelanggan/register")
    fun doRegister(@Body request: RegisterRequest): Observable<RegisterResponse>

    @GET("event/listbytime")
    fun doGetListEvent(): Observable<EventResponse>

    @POST("transaksi/listalltransaksi")
    fun doGetTicket(@Body request: TicketRequest): Observable<TicketResponse>

    @POST("transaksi/dotransaksi")
    fun doTransaksi(@Body request: TransaksiRequest): Observable<TransaksiResponse>

    @POST("transaksi/refundmoblist")
    fun doGetListRefund(@Body request : TicketRequest) : Observable<ListRefundResponse>


    @POST("transaksi/refundmob")
    fun doRefund(@Body request : RefundRequest) : Observable<RefundResponse>
}