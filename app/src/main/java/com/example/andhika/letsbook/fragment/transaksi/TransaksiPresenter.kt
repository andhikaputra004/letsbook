package com.example.andhika.letsbook.fragment.transaksi

import com.example.andhika.letsbook.base.BasePresenter
import com.example.andhika.letsbook.model.TicketRequest
import com.example.andhika.letsbook.network.NetworkManager
import javax.inject.Inject

class TransaksiPresenter @Inject constructor(val networkManager: NetworkManager) : BasePresenter(),
    TransaksiContract.Presenter {
    var view: TransaksiContract.View? = null

    override fun goToMain(request: TicketRequest) {
        compositeDisposable.addAll(networkManager.doGetTicket(request, {
            view?.getListEvent(it)
        }, {

        }))
    }

    override fun takeView(view: TransaksiContract.View) {
        this.view = view
    }

    override fun dropView() {
        view = null
    }

}