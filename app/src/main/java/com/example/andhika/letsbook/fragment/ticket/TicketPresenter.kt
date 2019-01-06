package com.example.andhika.letsbook.fragment.ticket

import com.example.andhika.letsbook.base.BasePresenter
import com.example.andhika.letsbook.model.TicketRequest
import com.example.andhika.letsbook.network.NetworkManager
import javax.inject.Inject

class TicketPresenter @Inject constructor(val networkManager: NetworkManager) : BasePresenter(),
    TicketContract.Presenter {
    var view: TicketContract.View? = null

    override fun goToMain(request: TicketRequest) {
        compositeDisposable.addAll(networkManager.doGetTicket(request,{
            view?.getListEvent(it)
        },{

        }))
    }

    override fun takeView(view: TicketContract.View) {
        this.view = view
    }

    override fun dropView() {
        view = null
    }
}