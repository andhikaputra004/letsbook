package com.example.andhika.letsbook.belitiket

import com.example.andhika.letsbook.base.BasePresenterInterface
import com.example.andhika.letsbook.base.BaseViewInterface
import com.example.andhika.letsbook.model.TransaksiRequest
import com.example.andhika.letsbook.model.TransaksiResponse


interface TransaksiContract {

    interface View : BaseViewInterface<Presenter> {
        fun doTransaksi(response: TransaksiResponse)
    }

    interface Presenter : BasePresenterInterface<View> {
        fun goToMain(request: TransaksiRequest)
    }
}