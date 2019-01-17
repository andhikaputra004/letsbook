package com.example.andhika.letsbook.belitiket

import com.example.andhika.letsbook.base.BaseActivity
import com.example.andhika.letsbook.base.BasePresenter
import com.example.andhika.letsbook.deps.ActivityScoped
import com.example.andhika.letsbook.model.TransaksiRequest
import com.example.andhika.letsbook.network.NetworkManager
import javax.inject.Inject

@ActivityScoped
class TransaksiPresenter @Inject constructor(val networkManager: NetworkManager) : BasePresenter(), TransaksiContract.Presenter{

    var view : TransaksiContract.View? = null
    override fun goToMain(request: TransaksiRequest) {
        compositeDisposable.addAll(networkManager.doTransaksiMob(request,{
            when{
                it.status ?: true ->{
                    view?.doTransaksi(it)
                }
            }
        },{

        }))
    }

    override fun takeView(view: TransaksiContract.View) {
        this.view = view
    }

    override fun dropView() {
        view = null
    }

}