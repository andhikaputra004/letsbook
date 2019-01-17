package com.example.andhika.letsbook.network

import com.example.andhika.letsbook.model.*
import com.example.andhika.letsbook.utils.uisubscribe

class NetworkManager(val networkService: NetworkService){

    fun doLoginMobile(request: LoginRequest,
                      onNext: (LoginReponse) -> Unit,
                      onError: (Throwable) -> Unit) = networkService
        .doLogin(request)
        .uisubscribe(onNext, onError)


    fun doRegisterMobile(request: RegisterRequest,
                      onNext: (RegisterResponse) -> Unit,
                      onError: (Throwable) -> Unit) = networkService
        .doRegister(request)
        .uisubscribe(onNext, onError)


    fun doTransaksiMob(request: TransaksiRequest,
                         onNext: (TransaksiResponse) -> Unit,
                         onError: (Throwable) -> Unit) = networkService
        .doTransaksi(request)
        .uisubscribe(onNext, onError)


    fun doGetEvent(onNext: (EventResponse) -> Unit,
                   onError: (Throwable) -> Unit) = networkService
        .doGetListEvent()
        .uisubscribe(onNext, onError)


    fun doGetTicket(request: TicketRequest,
                   onNext: (TicketResponse) -> Unit,
                   onError: (Throwable) -> Unit) = networkService
        .doGetTicket(request)
        .uisubscribe(onNext, onError)


    fun doGetListRefund(request: TicketRequest,
                    onNext: (ListRefundResponse) -> Unit,
                    onError: (Throwable) -> Unit) = networkService
        .doGetListRefund(request)
        .uisubscribe(onNext, onError)


    fun doRefund(request: RefundRequest,
                        onNext: (RefundResponse) -> Unit,
                        onError: (Throwable) -> Unit) = networkService
        .doRefund(request)
        .uisubscribe(onNext, onError)
}