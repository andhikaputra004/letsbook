package com.example.andhika.letsbook.fragment.refund

import com.example.andhika.letsbook.base.BasePresenterInterface
import com.example.andhika.letsbook.base.BaseViewInterface
import com.example.andhika.letsbook.model.ListRefundResponse
import com.example.andhika.letsbook.model.TicketRequest
import com.example.andhika.letsbook.model.TicketResponse


interface RefundContract {


    interface View : BaseViewInterface<Presenter> {
        fun getListEvent(response: ListRefundResponse)
    }

    interface Presenter : BasePresenterInterface<View> {
        fun goToMain(request: TicketRequest)
    }
}