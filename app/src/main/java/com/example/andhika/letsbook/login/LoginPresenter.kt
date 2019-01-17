package com.example.andhika.letsbook.login

import com.example.andhika.letsbook.base.BasePresenter
import com.example.andhika.letsbook.deps.ActivityScoped
import com.example.andhika.letsbook.model.LoginRequest
import com.example.andhika.letsbook.network.NetworkManager
import io.reactivex.Observable
import io.reactivex.android.schedulers.AndroidSchedulers
import javax.inject.Inject

@ActivityScoped
class LoginPresenter @Inject constructor(val networkManager: NetworkManager) : BasePresenter(),
    LoginContract.Presenter {
    var view: LoginContract.View? = null

    override fun goToLogin(request: LoginRequest) {
        compositeDisposable.addAll(networkManager.doLoginMobile(request,{
            when{
                it.success ?: false ->{
                    view?.getLoginReponse(it)
                }
                else->{
                    view?.showError(it)
                }
            }
        },{

        }))
    }

    override fun setValidation(validation: Observable<Boolean>) {
        compositeDisposable.add(
            validation.observeOn(AndroidSchedulers.mainThread())
                .subscribe {
                    view?.getValidation(it)
                }
        )
    }


    override fun takeView(view: LoginContract.View) {
        this.view = view
    }

    override fun dropView() {
        view = null
    }
}