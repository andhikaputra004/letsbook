package com.example.andhika.letsbook.fragment.refund

import com.example.andhika.letsbook.base.BasePresenter
import com.example.andhika.letsbook.deps.FragmentScoped
import com.example.andhika.letsbook.model.TicketRequest
import com.example.andhika.letsbook.network.NetworkManager
import javax.inject.Inject

@FragmentScoped
class RefundPresenter @Inject constructor(val networkManager: NetworkManager) : BasePresenter() , RefundContract.Presenter {

    var view : RefundContract.View? = null

    override fun goToMain(request: TicketRequest) {
        compositeDisposable.addAll(networkManager.doGetListRefund(request,{
            view?.getListEvent(it)
        },{

        }))
    }

    override fun takeView(view: RefundContract.View) {
        this.view = view
    }

    override fun dropView() {
        view = null
    }
}