package com.example.andhika.letsbook.fragment.transaksi

import com.example.andhika.letsbook.base.BasePresenterInterface
import com.example.andhika.letsbook.base.BaseViewInterface
import com.example.andhika.letsbook.model.TicketRequest
import com.example.andhika.letsbook.model.TicketResponse

interface TransaksiContract{

    interface View : BaseViewInterface<Presenter> {
        fun getListEvent(response: TicketResponse)
    }

    interface Presenter : BasePresenterInterface<View> {
        fun goToMain(request: TicketRequest)
    }
}