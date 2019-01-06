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


    fun doGetEvent(request: EventRequest,
                         onNext: (EventResponse) -> Unit,
                         onError: (Throwable) -> Unit) = networkService
        .doGetListEvent(request)
        .uisubscribe(onNext, onError)


    fun doGetTicket(request: TicketRequest,
                   onNext: (TicketResponse) -> Unit,
                   onError: (Throwable) -> Unit) = networkService
        .doGetTicket(request)
        .uisubscribe(onNext, onError)
}