package com.example.andhika.letsbook.login

import com.example.andhika.letsbook.base.BasePresenterInterface
import com.example.andhika.letsbook.base.BaseViewInterface
import com.example.andhika.letsbook.model.LoginReponse
import com.example.andhika.letsbook.model.LoginRequest
import io.reactivex.Observable

interface LoginContract {

    interface View : BaseViewInterface<Presenter>{
        fun getLoginReponse(response : LoginReponse)
        fun getValidation(boolean: Boolean)
        fun showError(error: Any)
    }

    interface Presenter : BasePresenterInterface<View>{
        fun goToLogin(request : LoginRequest)
        fun setValidation(validation : Observable<Boolean>)


    }
}