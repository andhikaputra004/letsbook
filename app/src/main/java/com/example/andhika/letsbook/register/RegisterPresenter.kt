package com.example.andhika.letsbook.register

import com.example.andhika.letsbook.base.BasePresenter
import com.example.andhika.letsbook.deps.ActivityScoped
import com.example.andhika.letsbook.model.RegisterRequest
import com.example.andhika.letsbook.network.NetworkManager
import javax.inject.Inject

@ActivityScoped
class RegisterPresenter @Inject constructor(val networkManager: NetworkManager) : BasePresenter() , RegisterContract.Presenter{

    var view : RegisterContract.View? = null

    override fun goToMain(request: RegisterRequest) {
        compositeDisposable.addAll(networkManager.doRegisterMobile(request,{
            when{
                it.success ?: false -> {
                    view?.postRegister(it)
                }
            }
        },{

        }))
    }

    override fun takeView(view: RegisterContract.View) {
        this.view = view
    }

    override fun dropView() {
        view = null
    }

}