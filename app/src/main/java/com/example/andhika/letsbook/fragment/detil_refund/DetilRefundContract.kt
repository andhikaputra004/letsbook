package com.example.andhika.letsbook.fragment.detil_refund

import com.example.andhika.letsbook.base.BasePresenterInterface
import com.example.andhika.letsbook.base.BaseViewInterface
import com.example.andhika.letsbook.model.RefundRequest
import com.example.andhika.letsbook.model.RefundResponse


interface DetilRefundContract {


    interface View : BaseViewInterface<Presenter> {
        fun getrefund(response: RefundResponse)
    }

    interface Presenter : BasePresenterInterface<View> {
        fun goToMain(request: RefundRequest)
    }
}