package com.example.andhika.letsbook.register

import com.example.andhika.letsbook.base.BasePresenterInterface
import com.example.andhika.letsbook.base.BaseViewInterface
import com.example.andhika.letsbook.model.RegisterRequest
import com.example.andhika.letsbook.model.RegisterResponse
import io.reactivex.Observable

interface RegisterContract {

    interface View : BaseViewInterface<Presenter> {
        fun postRegister(response: RegisterResponse)
        fun getValidation(boolean: Boolean)
        fun showError(error : Any)
    }

    interface Presenter : BasePresenterInterface<View> {
        fun goToMain(request: RegisterRequest)
        fun setValidation(validation: Observable<Boolean>)

    }
}