package com.example.andhika.letsbook.register

import com.example.andhika.letsbook.base.BasePresenterInterface
import com.example.andhika.letsbook.base.BaseViewInterface
import com.example.andhika.letsbook.model.RegisterRequest
import com.example.andhika.letsbook.model.RegisterResponse

interface RegisterContract {

    interface View : BaseViewInterface<Presenter> {
        fun postRegister(response: RegisterResponse)
    }

    interface Presenter : BasePresenterInterface<View> {
        fun goToMain(request: RegisterRequest)
    }
}