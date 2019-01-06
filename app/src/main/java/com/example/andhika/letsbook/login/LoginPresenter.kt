package com.example.andhika.letsbook.login

import com.example.andhika.letsbook.base.BasePresenter
import com.example.andhika.letsbook.deps.ActivityScoped
import com.example.andhika.letsbook.model.LoginRequest
import com.example.andhika.letsbook.network.NetworkManager
import javax.inject.Inject

@ActivityScoped
class LoginPresenter @Inject constructor(val networkManager: NetworkManager) : BasePresenter(),
    LoginContract.Presenter {
    override fun goToLogin(request: LoginRequest) {
        compositeDisposable.addAll(networkManager.doLoginMobile(request,{
            when{
                it.success ?: false ->{
                    view?.getLoginReponse(it)
                }
            }
        },{

        }))
    }

    var view: LoginContract.View? = null

    override fun takeView(view: LoginContract.View) {
        this.view = view
    }

    override fun dropView() {
        view = null
    }
}